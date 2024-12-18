<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/geral.css')}}">
    <link rel="stylesheet" href="{{asset('css/scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/div.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/section.css')}}">
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <link rel="stylesheet" href="{{asset('css/elements.css')}}">
    <link rel="stylesheet" href="{{asset('css/text.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">

    <link rel="shortcut icon" href="{{asset('images/svg/Component1.ico')}}" type="image/x-icon">
    <title>Invictus | Academia Inteligente</title>
</head>
<body>
    <header class="site-header">
        <a href="#site-section-home">
            <svg class="site-header__logo"  width="40" height="40" viewBox="0 0 4242 3001" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M1595.44 0C1596.09 0 1596.7 0.31526 1597.08 0.845479L2119.14 739.301C2119.93 740.428 2121.61 740.428 2122.4 739.301L2644.46 0.84546C2644.83 0.31524 2645.44 0 2646.09 0H4239.53C4241.15 0 4242.1 1.82985 4241.17 3.15454L3707.52 758H2664.65V890H3614.2L3052.17 1685H2681.65V1817H2958.85L2122.4 3000.16C2121.6 3001.29 2119.93 3001.29 2119.13 3000.16L1282.69 1817H1629.65V1685H1189.37L627.334 890H1618.65V758H534.016L0.370398 3.15455C-0.566105 1.82986 0.3812 0 2.0035 0H1595.44Z" fill="#CCFF33"/>
            </svg>
        </a>

        <nav class="site-header__nav">
            <a class="site-header__nav__link" href="#site-section-services">Serviços</a>
            <a class="site-header__nav__link" href="#site-section-about">Sobre</a>
            <a class="site-header__nav__link" href="#site-section-planes">Planos</a>
            <a class="site-header__nav__link" href="#site-section-testimonials">Depoimentos</a>
            <a class="site-header__nav__link" href="#site-section-contact">Contato</a>
        </nav>

        <div class="site-header__actions">
            <button class="btn-secondary"><a href="{{route('login')}}">Entrar</a></button>
            <button class="btn-primary"><a href="{{route('register')}}">Criar Conta</a></button>
        </div>
    </header>
    <main>
        <section id="site-section-home" class="site-section-home">
            <div class="site-section__description">
                <h1>Transforme seu potencial em realidade na Invictus</h1>
                <p>
                    Na Invictus, acreditamos que cada treino é uma oportunidade para se desafiar e crescer. 
                    Junte-se a nós e transforme sua rotina de exercícios em um estilo de vida.
                </p>
                <button class="btn-primary__description">
                    Quero conhecer a Invictus
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" fill="#22262a"/>
                    </svg>
                </button>
            </div>
        </section>
        <section id="site-section-services" class="site-section-services">
            <h2>Nossos serviços</h2>
            <p>
                Na Invictus, oferecemos uma gama de serviços dedicados a ajudar você a alcançar sua melhor forma.
            </p>

            <div class="site-section__services">
                <div class="site-section__services__card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2" fill="#ccff33"/>
                    </svg>
                    <h3>Treinos</h3>
                    <p>
                        Programas de treino personalizados para todos os níveis, 
                        garantindo evolução contínua e segurança em cada movimento.
                    </p>
                    <a class="site-section__services__card__link" href="#">
                        Conhecer serviço
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" fill="#ccff33"/>
                        </svg>
                    </a>
                </div>

                <div class="site-section__services__card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" fill="#ccff33"/>
                    </svg>
                    <h3>Personal Training</h3>
                    <p>
                        Acompanhamento exclusivo com profissionais qualificados que ajudam 
                        você a alcançar seus objetivos de forma eficaz.
                    </p>
                    <a class="site-section__services__card__link" href="#">
                        Conhecer serviço
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" fill="#ccff33"/>
                        </svg>
                    </a>
                </div>

                <div class="site-section__services__card">
                    <svg class="site-section__services__card__icon" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                        <path d="M4 11H2v3h2zm5-4H7v7h2zm5-5v12h-2V2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1z" fill="#ccff33"/>
                    </svg>
                    <h3>Progresso</h3>
                    <p>
                        Monitore seu desempenho e conquistas ao longo do tempo, 
                        com feedbacks que impulsionam sua evolução.
                    </p>
                    <a class="site-section__services__card__link" href="#">
                        Conhecer serviço
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" fill="#ccff33"/>
                        </svg>
                    </a>
                </div>

                <div class="site-section__services__card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-lightning-charge" viewBox="0 0 16 16">
                        <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41z" fill="#ccff33"/>
                    </svg>
                    <h3>Atividades</h3>
                    <p>
                        Uma variedade de atividades para manter seu treino dinâmico
                        e motivador, de cardio e musculação a aulas em grupo.
                    </p>
                    <a class="site-section__services__card__link" href="#">
                        Conhecer serviço
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" fill="#ccff33"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        <section id="site-section-about" class="site-section-about">
            <div class="site-section__description">
                <h2>Transforme seu potencial em força!</h2>
                <p>
                    Na Invictus, acreditamos que cada treino é uma oportunidade de superação.  
                    Somos mais que uma academia: somos uma comunidade que inspira.
                </p>
                <button class="btn-primary__description">
                    Saiba mais e comece agora
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" fill="#22262a"/>
                    </svg>
                </button>
            </div>
        </section>
        <section id="site-section-planes" class="site-section-planes">
            <h2>Escolha seu plano</h2>
            <p>
                Encontre o plano perfeito para atingir seus objetivos.
            </p>

            <div class="site-section__planes">
                <div class="site-section__planes__card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-lightning-charge" viewBox="0 0 16 16">
                        <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41z" fill="#ccff33"/>
                    </svg>
                    <h3>Plano Pro</h3>
                    <h4>R$ 99,99</h4>
                    <ul>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" fill="#ccff33"/>
                            </svg>
                            Acesso total aos equipamentos de musculação e cardio
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" fill="#ccff33"/>
                            </svg>
                            Horários flexíveis
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" fill="#ccff33"/>
                            </svg>
                            Aulas coletivas inclusas
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" fill="#ccff33"/>
                            </svg>
                            Consultoria inicial com personal
                        </li>
                    </ul>
                    <button class="btn-primary">Quero o plano pro</button>
                </div>

                <div class="site-section__planes__card__premium">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-lightning-charge" viewBox="0 0 16 16">
                        <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41z" fill="#ccff33"/>
                    </svg>
                    <h3>Plano Premium</h3>
                    <h4>R$ 150,00</h4>
                    <ul>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" fill="#ccff33"/>
                            </svg>
                            Todos os benefícios do Plano Pro
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" fill="#ccff33"/>
                            </svg>
                            Treinamento personalizado com personal
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" fill="#ccff33"/>
                            </svg>
                            Acesso exclusivo às áreas VIP
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" fill="#ccff33"/>
                            </svg>
                            Avaliações físicas mensais
                        </li>
                    </ul>
                    <button class="btn-primary">Quero o plano premium</button>
                </div>

            </div>
        </section>
        <section id="site-section-testimonials" class="site-section-testimonials">
            <h2>Depoimentos de quem confia na Invictus</h2>
            <p>
                Veja o que nossos membros têm a dizer! Na Invictus, cada vitória conta.
            </p>

            <div class="site-section__testimonials">
                <div class="site-section__testimonials__card">
                    <img class="site-section__testimonials__card__avatar" src="{{asset('images/svg/avatar1.svg')}}" alt="Avatar" draggable="false">
                    <h3>Lucas Monteiro</h3>
                    <div class="site-section__testimonials__card__score">
                        <p>5/5</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" fill="#ccff33"/>
                        </svg>
                    </div>
                    <p>
                        A Invictus me ajudou a transformar minha rotina e a superar meus próprios limites. 
                        Aqui me sinto motivado todos os dias!
                    </p>
                </div>

                <div class="site-section__testimonials__card">
                    <img class="site-section__testimonials__card__avatar" src="{{asset('images/svg/avatar3.svg')}}" alt="Avatar" draggable="false">
                    <h3>Camila Silva</h3>
                    <div class="site-section__testimonials__card__score">
                        <p>5/5</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" fill="#ccff33"/>
                        </svg>
                    </div>
                    <p>
                        A equipe da Invictus me acolheu desde o primeiro dia. 
                        Com o Plano Premium, sinto que cada treino é único e feito para mim.
                    </p>
                </div>

                <div class="site-section__testimonials__card">
                    <img class="site-section__testimonials__card__avatar" src="{{asset('images/svg/avatar2.svg')}}" alt="Avatar" draggable="false">
                    <h3>Rafael Teixeira</h3>
                    <div class="site-section__testimonials__card__score">
                        <p>5/5</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" fill="#ccff33"/>
                        </svg>
                    </div>
                    <p>
                        A energia da Invictus é incrível! As aulas coletivas são desafiadoras e divertidas. 
                        Nunca fui tão fiel a uma rotina de treinos quanto agora.
                    </p>
                </div>

                <div class="site-section__testimonials__card">
                    <img class="site-section__testimonials__card__avatar" src="{{asset('images/svg/avatar4.svg')}}" alt="Avatar" draggable="false">
                    <h3>Larissa Pereira</h3>
                    <div class="site-section__testimonials__card__score">
                        <p>5/5</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" fill="#ccff33"/>
                        </svg>
                    </div>
                    <p>
                        Escolhi a Invictus pelo suporte diferenciado e não me arrependo. 
                        Os profissionais são excelentes, e o ambiente é motivador.
                    </p>
                </div>
            </div>
        </section>
        <section id="site-section-contact" class="site-section-contact">
            <h2>Entre em contato com a Invictus</h2>
            <p>
                Deixe sua mensagem caso tenha alguma dúvida. Vamos adorar falar com você!
            </p>
            <form action="" method="post">
                <label for="nome">Nome:</label>
                <input type="text" placeholder="Nome" required minlength="0" maxlength="100">

                <label for="email">Email:</label>
                <input type="email" placeholder="Email" required minlength="0" maxlength="100">

                <label for="mensagem">Mensagem:</label>
                <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem..." required minlength="0" maxlength="100"></textarea>

                <input type="submit" value="Enviar Mensagem" name="" id="">
                <input type="reset" value="Limpar Campos">
            </form>
        </section>
        <footer>
            <p><strong>Programação Web I (PWEBI)</strong></p>
    
            <p>André Casimiro da Silva (Front-end)</p>
            <p>Nickolas Davi Vieira Lima (Front-end)</p>
            <p>Guilherme Bandeira Dias (Banco de dados e Back-end)</p>
            <p>Francisca Geovanna de Lima da Silva (Back-end)</p>
            <p>Raimundo Gabriel Pereira Ferreira (Back-end)</p>
        </footer>
    </main>
</body>
</html>