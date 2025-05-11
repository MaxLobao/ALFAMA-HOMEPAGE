<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Saiba Mais</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
            Olá, me chamo Max. Estou participando do processo seletivo da Alfama. A partir dos accordion's abaixo você saberá todo o passo-a-passo realizado para a conclusão deste projeto. Obrigado pela atenção e até breve =D.
        </p>

        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Resumo
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <p>
                        O layout possui três telas (Cadastro, Login e Dashboard) e foi desenvolvido com base em PHP, HTML e CSS, além da ajuda do framework Bootstrap.  
                        Para o banco foi utilizado o MySQL e para o auxilio do formulário utilizado o JS.     
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Organização do Código
                </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        A estrutura está em Bootstrap, sendo separada suas partes em Col's. As telas apresentam um Navbar simples e responsivo. No canto esquerdo temos a logo da Alfama, que está na pasta "Assets", já no canto direito temos o link "Saiba Mais", no qual está este modal. Ainda nestas duas telas, encontra-se o formulario de cadastro ou login. </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Telas
                    </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Nas telas de Cadastro e Login, na col-sm-5, temos a estrutura do Main, que comporta as seções do Formulário e o footer, presente apenas na tela de Login. Já na col-sm-7 temos a tela de collapse.
                            Na tela Dashboard, apresenta o navbar pouco diferente com o menu de delete e logout. Segue o mesmo padrão para o formulário também.
                        </div>
                    </div>
                </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Voltar</button>
      </div>
    </div>
  </div>
</div>