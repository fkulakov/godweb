<html lang="ru">
    <head>
        <title>GODWEB</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>
        <section id="times" class="times">
            <h3>Шуток про пидоров и говно не было уже</h3>
            <div v-for="interval in intervals">
                <div class="interval-row">
                    <s>@{{ interval }}</s>
                </div>
            </div>
            <div class="interval-row">@{{ current }}</div>
            <div class="reset-button">
                <button v-on:click="reset">Сбросить</button>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script src="/js/times.js"></script>
    </body>
</html>