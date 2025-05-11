$(document).ready(function () {
  // Create
  $("#form_register").submit(function (event) {
    event.preventDefault();
    let name = $("#name").val();
    let email = $("#email").val();
    let password = $("#password").val();
    $.ajax({
      url: "/alfama/app/functions.php",
      method: "POST",
      data: {
        action: "register",
        name: name,
        email: email,
        password: password,
      },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          $("#message_register").html(showAlert("success", response.message));
          $("#form_register")[0].reset();
          window.location.replace("login.php");
        } else {
          $("#message_register").html(showAlert("danger", response.message));
        }
      },
      error:function(xhr,status,error){
        console.log(xhr.responseText)
      }
    });
  });

  // Login
  $("#form_login").submit(function (event) {
    event.preventDefault();
    console.log("chegueiaqui");
    let email = $("#email").val();
    let password = $("#password").val();

    $.ajax({
      url: "/alfama/app/functions.php",
      method: "POST",
      data: {
        action: "login",
        email: email,
        password: password,
      },
      dataType: "json",
      success: function (response) {
        console.log("sucesso");
        if (response.success) {
        //  $("#message_login").html(showAlert("success", response.message));
          $("#form_login")[0].reset();
          window.location.replace("dashboard.php");
        } else {
          $("#message_login").html(showAlert("danger", response.message));
        }
      },
      error: function (xhr, status, error) {console.log(xhr.responseText)},
    });
  });

  // Dashboard
  $("#form_edit").submit(function (event) {
    event.preventDefault();

    // Serializa todos os campos para encaminhar para a edição
    let formData = $(this).serialize();

    if (formData) {
      formData += "&action=edit";

      $.ajax({
        url: "/alfama/app/functions.php",
        method: "POST",
        data: formData,
        dataType: "json",
        success: function (response) {
          if (response.success) {
            $("#display_name").text($("#name").val());
            $("#display_profession").text($("#profession").val());

            $("#message_edit").html(showAlert("success", response.message));

            $("#form_edit")
              .find("input")
              .each(function () {
                $(this).attr("value", $(this).val());
              });
          } else {
            $("#message_edit").html(showAlert("danger", response.message));
          }
        },
        error: function () {},
      });
    } else {
      $("#message_edit").html(showAlert("info", "Nenhum campo foi alterado."));
    }
  });
});

function showAlert(type, message, duration = 3000) {
  const alertElement = $(
    '<div class="alert alert-' +
      type +
      ' alert-dismissible" role="alert">' +
      "<div>" +
      message +
      "</div>" +
      ' <button type="button" class="btn-close" data-bs-dismiss="alert"' +
      'aria-label="Close"></button>' +
      "</div>"
  );

  $("#message_container").append(alertElement);

  setTimeout(function () {
    alertElement.alert("close");
  }, duration);
}

$('#delete-user').on('click', function () {
  if (confirm('Tem certeza que deseja deletar sua conta? Esta ação não poderá ser desfeita.')) {
    $.post('auth.php', { action: 'delete' }, function(response) {
      if (response.success) {
        alert(response.message);
        window.location.href = 'login.php';
      } else {
        alert('Erro: ' + response.message);
      }
    }, 'json');
  }
});

