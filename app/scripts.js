$(document).ready(function () {
  // Create
  $("#form_register").submit(function (event) {
      event.preventDefault();

      const name = $("#name").val().trim();
      const email = $("#email").val().trim();
      const password = $("#password").val();
      const erroSenha = $("#senhaErro");

      let erros = [];

      // Validações
      if (!name) {
        erros.push("O nome é obrigatório.");
      }

      if (!email) {
        erros.push("O e-mail é obrigatório.");
      } else if (!validateEmail(email)) {
        erros.push("O e-mail está em um formato inválido.");
      }

      if (password.length < 8) {
        erros.push("A senha deve ter pelo menos 8 caracteres.");
        erroSenha.removeClass("d-none");
      } else {
        erroSenha.addClass("d-none");
      }

      if (erros.length > 0) {
        const mensagem = erros.map(erro => `<div>${erro}</div>`).join("");
        $("#message_register").html(showAlert("danger", mensagem));
        return;
      }

      // Envia o AJAX se tudo estiver válido
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
        }
      });
    });

  // Login
  $("#form_login").submit(function (event) {
    event.preventDefault();

    let email = $("#email").val().trim();
    let password = $("#password").val();

    let erros = [];

    if (!email) {
      erros.push("O campo de e-mail é obrigatório.");
    } else if (!validateEmail(email)) {
      erros.push("Formato de e-mail inválido.");
    }

    if (!password) {
      erros.push("O campo de senha é obrigatório.");
    }

    // Se houver erros, exibe e cancela envio
    if (erros.length > 0) {
      const mensagem = erros.map(erro => `<div>${erro}</div>`).join("");
      $("#message_login").html(showAlert("danger", mensagem));
      return;
    }

    // Continua com AJAX se estiver tudo ok
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
        if (response.success) {
          $("#message_login").html(showAlert("success", response.message));
          $("#form_login")[0].reset();
          window.location.replace("dashboard.php");
        } else {
          $("#message_login").html(showAlert("danger", response.message));
        }
      },
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
            $("#display_empresa").text($("#empresa").val());

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
      });
    } else {
      $("#message_edit").html(showAlert("info", "Nenhum campo foi alterado."));
    }
  });

  // Logout
  $("#logout-link").on("click", function (e) {
    e.preventDefault();

    $.ajax({
      url: "logout.php",
      type: "POST",
      success: function () {
        window.location.href = "login.php";
      },
      error: function () {
        alert("Erro ao tentar fazer logout.");
      },
    });
  });

  // Deletar conta
  $("#delete-account").on("click", function (e) {
    e.preventDefault();

    if (!confirm("Tem certeza que deseja deletar sua conta? Essa ação é irreversível.")) {
      return;
    }

    $.ajax({
      url: "functions.php", 
      type: "POST",
      data: { action: "delete" },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert("Sua conta foi deletada com sucesso.");
          window.location.href = "login.php";
        } else {
          alert(response.message || "Erro ao tentar deletar a conta.");
        }
      },
      error: function () {
        alert("Erro ao tentar deletar a conta.");
      },
    });
  });

  $('#telefone').mask('(00) 00000-0000');
  $('#cpf').mask('000.000.000-00');

});

 $("#toggleSenha").on("click", function () {
      const senhaInput = $("#password")[0];
      const isHidden = senhaInput.type === "password";
      senhaInput.type = isHidden ? "text" : "password";
      $(this).text(isHidden ? "visibility" : "visibility_off");
    });

    // Validação de e-mail com regex
   function validateEmail(email) {
  const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  return regex.test(email);
}

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


