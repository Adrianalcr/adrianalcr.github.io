<?php
require_once 'header.php';
?>

<section id="politicaPrivacidade" class="container">
    <div class="politica-de-privacidade">
        <div class="">
            <h2>Termos de Uso do site.</h2>
            <br>Data/Hora de hoje: <p id="time"></p>
            <hr>
            <br>
            <h2>1. Termos</h2>
            <p>Ao acessar ao site <a href='https://adrianalima.dev.br'>Adriana Lima Dev Full Stack</a>, concorda em cumprir estes termos de serviço, todas as leis e regulamentos aplicáveis ​​e concorda que é responsável pelo cumprimento de todas as leis locais aplicáveis. Se você não concordar com algum desses termos, está proibido de usar ou acessar este site. Os materiais contidos neste site são protegidos pelas leis de direitos autorais e marcas comerciais aplicáveis.</p>
            <h2>2. Uso de Licença</h2>
            <p>É concedida permissão para baixar temporariamente uma cópia dos materiais (informações ou software) no site Adriana Lima Dev Full Stack , apenas para visualização transitória pessoal e não comercial. Esta é a concessão de uma licença, não uma transferência de título e, sob esta licença, você não pode: </p>
            <ol>
                <li>modificar ou copiar os materiais;  </li>
                <li>usar os materiais para qualquer finalidade comercial ou para exibição pública (comercial ou não comercial);  </li>
                <li>tentar descompilar ou fazer engenharia reversa de qualquer software contido no site Adriana Lima Dev Full Stack;  </li>
                <li>remover quaisquer direitos autorais ou outras notações de propriedade dos materiais; ou  </li>
                <li>transferir os materiais para outra pessoa ou 'espelhe' os materiais em qualquer outro servidor.</li>
            </ol>
            <p>Esta licença será automaticamente rescindida se você violar alguma dessas restrições e poderá ser rescindida por Adriana Lima Dev Full Stack a qualquer momento. Ao encerrar a visualização desses materiais ou após o término desta licença, você deve apagar todos os materiais baixados em sua posse, seja em formato eletrónico ou impresso.</p>
            <h2>3. Isenção de responsabilidade</h2>
            <ol>
                <li>Os materiais no site da Adriana Lima Dev Full Stack são fornecidos 'como estão'. Adriana Lima Dev Full Stack não oferece garantias, expressas ou implícitas, e, por este meio, isenta e nega todas as outras garantias, incluindo, sem limitação, garantias implícitas ou condições de comercialização, adequação a um fim específico ou não violação de propriedade intelectual ou outra violação de direitos. </li>
                <li>Além disso, o Adriana Lima Dev Full Stack não garante ou faz qualquer representação relativa à precisão, aos resultados prováveis ​​ou à confiabilidade do uso dos materiais em seu site ou de outra forma relacionado a esses materiais ou em sites vinculados a este site.</li>
            </ol>
            <h2>4. Limitações</h2>
            <p>Em nenhum caso o Adriana Lima Dev Full Stack ou seus fornecedores serão responsáveis ​​por quaisquer danos (incluindo, sem limitação, danos por perda de dados ou lucro ou devido a interrupção dos negócios) decorrentes do uso ou da incapacidade de usar os materiais em Adriana Lima Dev Full Stack, mesmo que Adriana Lima Dev Full Stack ou um representante autorizado da Adriana Lima Dev Full Stack tenha sido notificado oralmente ou por escrito da possibilidade de tais danos. Como algumas jurisdições não permitem limitações em garantias implícitas, ou limitações de responsabilidade por danos conseqüentes ou incidentais, essas limitações podem não se aplicar a você.</p>
            <h2>5. Precisão dos materiais</h2>
            <p>Os materiais exibidos no site da Adriana Lima Dev Full Stack podem incluir erros técnicos, tipográficos ou fotográficos. Adriana Lima Dev Full Stack não garante que qualquer material em seu site seja preciso, completo ou atual. Adriana Lima Dev Full Stack pode fazer alterações nos materiais contidos em seu site a qualquer momento, sem aviso prévio. No entanto, Adriana Lima Dev Full Stack não se compromete a atualizar os materiais.</p>
            <h2>6. Links</h2>
            <p>O Adriana Lima Dev Full Stack não analisou todos os sites vinculados ao seu site e não é responsável pelo conteúdo de nenhum site vinculado. A inclusão de qualquer link não implica endosso por Adriana Lima Dev Full Stack do site. O uso de qualquer site vinculado é por conta e risco do usuário.</p>
            </p>
            <h3>Modificações</h3>
            <p>O Adriana Lima Dev Full Stack pode revisar estes termos de serviço do site a qualquer momento, sem aviso prévio. Ao usar este site, você concorda em ficar vinculado à versão atual desses termos de serviço.</p>
            <h3>Lei aplicável</h3>
            <p>Estes termos e condições são regidos e interpretados de acordo com as leis do Adriana Lima Dev Full Stack e você se submete irrevogavelmente à jurisdição exclusiva dos tribunais naquele estado ou localidade.</p>
        </div>
    </div>
    <script>
        var timeDisplay = document.getElementById("time");

        function refreshTime() {
            var dateString = new Date().toLocaleString("pt-BR", {
                timeZone: "America/Sao_Paulo"
            });
            var formattedString = dateString.replace(", ", " - ");
            timeDisplay.innerHTML = formattedString;
        }
        setInterval(refreshTime, 1000);
    </script>
</section>


<?php include_once 'footer.php'; ?>