  <!-- HEAD -->
   <?php
      require 'source/Config.php';
      require 'source/Model.php';
      require 'public/head.php';
   ?>
  <!-- HEAD -->

  <!-- BODY -->
  <body class="">
    <nav id="navigation" class="">
      <div class="wrapper">
        <a class="logo" href="#home">
          Meu Estágio
        </a>

        <div class="menu">
          <ul>
            <li><a onclick="closeMenu()" href="#home">Início</a></li>
            <li><a onclick="closeMenu()" href="#services">Serviços</a></li>
            <li><a onclick="closeMenu()" href="#about">Sobre</a></li>
          </ul>

          <a class="button" href="login.php" onclick="closeMenu()"
            >Iniciar sessão</a
          >

          <ul class="social-links">
            <li>
              <a href="https://facebook.com/" target="_blank">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M17 1.99997H7C4.23858 1.99997 2 4.23855 2 6.99997V17C2 19.7614 4.23858 22 7 22H17C19.7614 22 22 19.7614 22 17V6.99997C22 4.23855 19.7614 1.99997 17 1.99997Z"
                    stroke="#FFFAF1"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M15.9997 11.3701C16.1231 12.2023 15.981 13.0523 15.5935 13.7991C15.206 14.5459 14.5929 15.1515 13.8413 15.5297C13.0898 15.908 12.2382 16.0397 11.4075 15.906C10.5768 15.7723 9.80947 15.3801 9.21455 14.7852C8.61962 14.1903 8.22744 13.4229 8.09377 12.5923C7.96011 11.7616 8.09177 10.91 8.47003 10.1584C8.84829 9.40691 9.45389 8.7938 10.2007 8.4063C10.9475 8.0188 11.7975 7.87665 12.6297 8.00006C13.4786 8.12594 14.2646 8.52152 14.8714 9.12836C15.4782 9.73521 15.8738 10.5211 15.9997 11.3701Z"
                    stroke="#FFFAF1"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M17.5 6.49997H17.51"
                    stroke="#FFFAF1"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </a>
            </li>
            <li>
              <a href="https://instagram.com/" target="_blank">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M18 1.99997H15C13.6739 1.99997 12.4021 2.52675 11.4645 3.46444C10.5268 4.40212 10 5.67389 10 6.99997V9.99997H7V14H10V22H14V14H17L18 9.99997H14V6.99997C14 6.73475 14.1054 6.4804 14.2929 6.29286C14.4804 6.10533 14.7348 5.99997 15 5.99997H18V1.99997Z"
                    stroke="#FFFAF1"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </a>
            </li>
            <li>
              <a href="https://youtube.com/" target="_blank">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M22.5396 6.42C22.4208 5.94541 22.1789 5.51057 21.8382 5.15941C21.4976 4.80824 21.0703 4.55318 20.5996 4.42C18.8796 4 11.9996 4 11.9996 4C11.9996 4 5.1196 4 3.3996 4.46C2.92884 4.59318 2.50157 4.84824 2.16094 5.19941C1.82031 5.55057 1.57838 5.98541 1.4596 6.46C1.14481 8.20556 0.990831 9.97631 0.999595 11.75C0.988374 13.537 1.14236 15.3213 1.4596 17.08C1.59055 17.5398 1.8379 17.9581 2.17774 18.2945C2.51758 18.6308 2.93842 18.8738 3.3996 19C5.1196 19.46 11.9996 19.46 11.9996 19.46C11.9996 19.46 18.8796 19.46 20.5996 19C21.0703 18.8668 21.4976 18.6118 21.8382 18.2606C22.1789 17.9094 22.4208 17.4746 22.5396 17C22.852 15.2676 23.0059 13.5103 22.9996 11.75C23.0108 9.96295 22.8568 8.1787 22.5396 6.42Z"
                    stroke="#FFFAF1"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M9.75 15.02L15.5 11.75L9.75 8.48001V15.02Z"
                    stroke="#FFFAF1"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </a>
            </li>
          </ul>
        </div>

        <button
          aria-expanded="false"
          aria-label="Abrir menu"
          class="open-menu"
          onclick="openMenu()"
        >
          <svg
            width="40"
            height="40"
            viewBox="0 0 40 40"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M10 20H30"
              stroke="#00856F"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M10 12H30"
              stroke="#00856F"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M18 28L30 28"
              stroke="#00856F"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </button>

        <button
          aria-expanded="true"
          aria-label="Fechar menu"
          class="close-menu"
          onclick="closeMenu()"
        >
          <svg
            width="40"
            height="40"
            viewBox="0 0 40 40"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M30 10L10 30M10 10L30 30"
              stroke="#FFFAF1"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </button>
      </div>
    </nav>

    <section id="home">
      <div class="wrapper">
        <div class="col-a">
          <header>
            <h4>BOAS-VINDAS A MEU ESTÁGIO 👋</h4>
            <h1>Sistema de Gestão de Estágio Curriculares</h1>
          </header>

          <div class="content">
            <p>
              Tens uma experiência 100% real sobre o modo de estagiar e o seu acompanhamento durante o período de estágio curricular.
            </p>

            <a class="button" href="#contact">
              Criar conta
            </a>
          </div>
        </div>

        <div class="col-b">
          <img
            src="theme/assets/images/mulher-negra-com-moletom-com-duas-maos-no-peito.png"
            alt="Mulher negra vestindo moletom verde e sorrindo"
          />
        </div>

        <div class="stats">

          <div class="stat">
            <h3>
            <?php
              $buscandoDadosStat = new Model();
              $buscando = $buscandoDadosStat->EXE_QUERY("SELECT * FROM tb_empresa");
              echo count($buscando);
            ?>
            </h3>
            <p>Empresas registradas</p>
          </div>

          <div class="stat">
            <h3>
            <?php
              $candidatos = new Model();
              $contadorCandidatos = $candidatos->EXE_QUERY("SELECT * FROM tb_candidatura_vaga");
              echo count($contadorCandidatos);
            ?>
            </h3>
            <p>Candidatos</p>
          </div>

          <div class="stat">
            <h3>
            <?php
              $vagaContador = new Model();
              $vaga = $vagaContador->EXE_QUERY("SELECT * FROM tb_vaga_estagio");
              echo count($vaga);
            ?>
            </h3>
            <p>Total de vagas</p>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="wrapper">
        <header>
          <h4>Serviços</h4>
          <h2>Como podemos ajudá-lo a sentir melhor?</h2>
        </header>

        <div class="content">
          <div class="cards">
            <div class="card">
              <!-- Colocar o svg -->
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <circle cx="12" cy="12" r="12" fill="#DCE9E2" />
                <path
                  d="M17.091 8.18188L10.091 15.1819L6.90918 12.0001"
                  stroke="#00856F"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <!-- Colocar o svg -->
              <h3>Divulgação de vagas</h3>
              <p>
               Uma forma eficiente e clara de divulgar as vagas para os estudantes do ensino médio e autocapacitar-los.
              </p>
            </div>

            <div class="card">
              <!-- Colocar o svg -->
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <circle cx="12" cy="12" r="12" fill="#DCE9E2" />
                <path
                  d="M17.091 8.18188L10.091 15.1819L6.90918 12.0001"
                  stroke="#00856F"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <!-- Colocar o svg -->
              <h3>Eficiência</h3>
              <p>
               Tornarmos eficiente a forma como os estudantes migram para o ambiente de trabalho
               dando assim à muitos uma experiência de trabalho.
              </p>
            </div>

            <div class="card">
              <!-- Colocar o svg -->
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <circle cx="12" cy="12" r="12" fill="#DCE9E2" />
                <path
                  d="M17.091 8.18188L10.091 15.1819L6.90918 12.0001"
                  stroke="#00856F"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <!-- Colocar o svg -->
              <h3>Oportunidade</h3>
              <p>
                Momentos oportunos para diferentes categorias e diferentes tipos de estudantes, apenas
                uma forma de ajudar os nossos alunos.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="about">
      <div class="wrapper">
        <div class="col-a">
          <header>
            <h4>Sobre Nós</h4>
            <h2>Entenda quem somos e por que existimos</h2>
          </header>

          <div class="content">
            <p>
             Estamos aqui para facilitar o modo de interação entre as entidades empresas e escolas e
             mostrando para os nossos estudante como pode ser aproveitado o ambiente de trabalho,
             melhorando 100% a visão das empresas para com as instituições de ensino.s
            </p>
          </div>
        </div>

        <div class="col-b">
          <img
            src="theme/assets/images/systeme/create-2.jpg"
            alt="Doutor feliz segurando prancheta com pacientes"
          />
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="wrapper">
        <div class="col-a">
          <header>
            <h2>Entre em contato com a gente!</h2>
          </header>

          <div class="content">
            <ul>
              <li>
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z"
                    stroke="#00856F"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                    stroke="#00856F"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>

                ITEL - CTT
              </li>
              <li>
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z"
                    stroke="#00856F"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M22 6L12 13L2 6"
                    stroke="#00856F"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>

               itel@gmail.com
              </li>
            </ul>

            <a
              class="button"
              href="create.php"
              target="_blank"
            >
             Criar conta</a
            >
          </div>
        </div>

        <div class="col-b">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31525.68336467159!2d13.249425674678779!3d-8.998771236670759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a521e8152c638bb%3A0xcc6002b20afcdea5!2sKilamba!5e0!3m2!1spt-PT!2sao!4v1610713316547!5m2!1spt-PT!2sao" width="600" height="450" frameborder="0" style="border: 0; width: 90%; height: 270px" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
      </div>
    </section>

    <footer>
      <div class="wrapper">
        <div class="col-a">
          <p>
            ©2022 - Meu Estágio. <br />
            Todos os direitos reservados.
          </p>
        </div>

        <div class="col-b">
          <ul class="social-links">
            <li>
              <a href="https://facebook.com/" target="_blank">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M17 1.99997H7C4.23858 1.99997 2 4.23855 2 6.99997V17C2 19.7614 4.23858 22 7 22H17C19.7614 22 22 19.7614 22 17V6.99997C22 4.23855 19.7614 1.99997 17 1.99997Z"
                    stroke="#FFFAF1"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M15.9997 11.3701C16.1231 12.2023 15.981 13.0523 15.5935 13.7991C15.206 14.5459 14.5929 15.1515 13.8413 15.5297C13.0898 15.908 12.2382 16.0397 11.4075 15.906C10.5768 15.7723 9.80947 15.3801 9.21455 14.7852C8.61962 14.1903 8.22744 13.4229 8.09377 12.5923C7.96011 11.7616 8.09177 10.91 8.47003 10.1584C8.84829 9.40691 9.45389 8.7938 10.2007 8.4063C10.9475 8.0188 11.7975 7.87665 12.6297 8.00006C13.4786 8.12594 14.2646 8.52152 14.8714 9.12836C15.4782 9.73521 15.8738 10.5211 15.9997 11.3701Z"
                    stroke="#FFFAF1"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M17.5 6.49997H17.51"
                    stroke="#FFFAF1"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </a>
            </li>
            <li>
              <a href="https://instagram.com/" target="_blank">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M18 1.99997H15C13.6739 1.99997 12.4021 2.52675 11.4645 3.46444C10.5268 4.40212 10 5.67389 10 6.99997V9.99997H7V14H10V22H14V14H17L18 9.99997H14V6.99997C14 6.73475 14.1054 6.4804 14.2929 6.29286C14.4804 6.10533 14.7348 5.99997 15 5.99997H18V1.99997Z"
                    stroke="#FFFAF1"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </a>
            </li>
            <li>
              <a href="https://youtube.com/" target="_blank">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M22.5396 6.42C22.4208 5.94541 22.1789 5.51057 21.8382 5.15941C21.4976 4.80824 21.0703 4.55318 20.5996 4.42C18.8796 4 11.9996 4 11.9996 4C11.9996 4 5.1196 4 3.3996 4.46C2.92884 4.59318 2.50157 4.84824 2.16094 5.19941C1.82031 5.55057 1.57838 5.98541 1.4596 6.46C1.14481 8.20556 0.990831 9.97631 0.999595 11.75C0.988374 13.537 1.14236 15.3213 1.4596 17.08C1.59055 17.5398 1.8379 17.9581 2.17774 18.2945C2.51758 18.6308 2.93842 18.8738 3.3996 19C5.1196 19.46 11.9996 19.46 11.9996 19.46C11.9996 19.46 18.8796 19.46 20.5996 19C21.0703 18.8668 21.4976 18.6118 21.8382 18.2606C22.1789 17.9094 22.4208 17.4746 22.5396 17C22.852 15.2676 23.0059 13.5103 22.9996 11.75C23.0108 9.96295 22.8568 8.1787 22.5396 6.42Z"
                    stroke="#FFFAF1"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M9.75 15.02L15.5 11.75L9.75 8.48001V15.02Z"
                    stroke="#FFFAF1"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </footer>

    <a id="backToTopButton" class="" href="#home">
      <svg
        width="40"
        height="40"
        viewBox="0 0 40 40"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <circle cx="20" cy="20" r="20" fill="#00856F" />
        <path
          d="M20 27V13"
          stroke="white"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
        <path
          d="M13 20L20 13L27 20"
          stroke="white"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
    </a>
  <!-- END BODY -->

  <!-- FOOTER -->
  <?php require 'public/includes/footer.php' ?>
  <!-- FOOTER -->
