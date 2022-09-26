<!DOCTYPE HTML>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body id="body">

    <fieldset>
    <form method="post" id="form">
        <!--  
            <fieldset id="0">
                <input type="text" name="0[pergunta]" id="0[pergunta]" placeholder="Pergunta...">
                <select name="0[tipo]" id="0[tipo]"  class="slc">
                    <option value="rCurta">Resposta Curta</option>
                    <option value="rLonga">Resposta Longa</option>
                    <option value="multEsc">Múltipla Escolha</option>
                    <option value="uniEsc">Escolha Única</option>
                    <option value="sel">Caixas de Seleção</option>
                </select>
            </fieldset>
        -->
        <div draggable="true" class="box">A</div>
  <div draggable="true" class="box">B</div>
  <div draggable="true" class="box">C</div>
        <button type="button" onclick="maisUm()">mais</button><input type="submit" value="vai">
    </form>
    </fieldset>
    <script>
        var count = 0;
        function geraInput(local, tipo){
            var COUNT = document.getElementById("contador"+local).value;
            var INPUT = document.createElement("input");
            INPUT.setAttribute("type", "text");
            INPUT.setAttribute("name", "pgt"+local+"[options]["+COUNT+"]");
            INPUT.setAttribute("id", "pgt"+local+"[options]["+COUNT+"]");
            INPUT.setAttribute("placeholder", "Resposta...");
            INPUT.setAttribute("class", "pgt"+local+tipo);
            br(local, tipo);
            return INPUT;
        }
        function deleteButton(local, tipo) {
            var COUNT = document.getElementById("contador"+local).value;
            var BUTTON = document.createElement("button");
            BUTTON.setAttribute("type", "button");
            BUTTON.setAttribute("placeholder", "Resposta...");
            BUTTON.setAttribute("id", "button"+local+"[options]["+COUNT+"]");
            BUTTON.setAttribute("class", "button"+local+tipo);
            BUTTON.textContent = "-";
            BUTTON.setAttribute("onclick", "deletar("+local+", "+COUNT+");");
            document.getElementById("contador"+local).value = parseInt(COUNT) + 1;
            return BUTTON;
        }
        function br(local, tipo) {
            var COUNT = document.getElementById("contador"+local).value;
            var BR = document.createElement("br");
            BR.setAttribute("class", "pgt"+local+tipo)
            BR.setAttribute("id", "BR"+local+COUNT)
            document.getElementById(local).appendChild(BR);
        }
        function maisUm() {
            var div = document.createElement("div");
            div.setAttribute("id", count);
            div.setAttribute("draggable", true);
            div.setAttribute("class", "box");
            
            var PGT = document.createElement("input");
            PGT.setAttribute("type", "text");
            PGT.setAttribute("name", "pgt"+count+"[pergunta]");
            PGT.setAttribute("id", "pgt"+count+"[pergunta]");

            var HIDDEN = document.createElement("input");
            HIDDEN.setAttribute("type", "hidden");
            HIDDEN.setAttribute("disabled", "");
            HIDDEN.setAttribute("id", "contador"+count);
            HIDDEN.value = 1;

            var SLC = document.createElement("select");
            SLC.setAttribute("type", "text");
            SLC.setAttribute("name", "pgt"+count+"[tipoP]");
            SLC.setAttribute("id", "pgt"+count+"[tipoP]");
            
            var OPT0 = document.createElement("option");
            OPT0.setAttribute("value", "rCurta");
            OPT0.text = "Resposta Curta";
            OPT0.setAttribute("onclick", "tipoPGT(0,'"+count+"')");
            
            var OPT1 = document.createElement("option");
            OPT1.setAttribute("value", "rLonga");
            OPT1.text = "Resposta Longa";
            OPT1.setAttribute("onclick", "tipoPGT(1,"+count+")");

            var OPT2 = document.createElement("option");
            OPT2.setAttribute("value", "multEsc");
            OPT2.text = "Multipla Escolha";
            OPT2.setAttribute("onclick", "tipoPGT(2,"+count+")");

            var OPT3 = document.createElement("option");
            OPT3.setAttribute("value", "uniEsc");
            OPT3.text = "Escolha Única";
            OPT3.setAttribute("onclick", "tipoPGT(3,"+count+")");

            var OPT4 = document.createElement("option");
            OPT4.setAttribute("value", "slc");
            OPT4.text = "Caixas de Seleção";
            OPT4.setAttribute("onclick", "tipoPGT(4,"+count+")");

            SLC.add(OPT0, SLC.options[0]);
            SLC.add(OPT1, SLC.options[1]);
            SLC.add(OPT2, SLC.options[2]);
            SLC.add(OPT3, SLC.options[3]);
            SLC.add(OPT4, SLC.options[4]);
            
            var DELPGT = document.createElement("button");
            DELPGT.setAttribute("type", "button");
            DELPGT.setAttribute("id", "del"+count);
            DELPGT.setAttribute("onclick", "delpgt("+count+");");
            DELPGT.setAttribute("style", "float:right;");
            DELPGT.textContent = "DELETE";

            var BR = document.createElement("span");
            BR.innerHTML = "<br>";
            div.appendChild(PGT);
            div.appendChild(HIDDEN);
            div.appendChild(SLC);
            div.appendChild(DELPGT);
            div.appendChild(BR);

            var RC = document.createElement("input");
            RC.setAttribute("type", "text");
            RC.setAttribute("name", "pgt"+count+"input");
            RC.setAttribute("id", "pgt"+count+"input");
            RC.setAttribute("disabled", "true");
            RC.setAttribute("placeholder", "Resposta...");
            div.appendChild(RC);   
            
            var RL = document.createElement("textarea");
            RL.setAttribute("name", "pgt"+count+"textarea");
            RL.setAttribute("id", "pgt"+count+"textarea");
            RL.setAttribute("disabled", "true");
            RL.setAttribute("style", "display:none");
            RL.setAttribute("placeholder", "Resposta...");
            div.appendChild(RL);

            var ME = document.createElement("input");
            ME.setAttribute("type", "text");
            ME.setAttribute("name", "pgt"+count+"[options][]");
            ME.setAttribute("id", "pgt"+count+"[options][0]");
            ME.setAttribute("disabled", "true");
            ME.setAttribute("style", "display:none");
            ME.setAttribute("placeholder", "Resposta...");
            ME.setAttribute("class", "pgt"+count+"ckb");
            div.appendChild(ME);
            var DOPC = document.createElement("button");
            DOPC.setAttribute("class", "button"+count+"ckb");
            DOPC.textContent = "-";
            DOPC.setAttribute("type", "button");
            DOPC.setAttribute("style", "display:none");
            DOPC.setAttribute("id", "button"+count+"[options][0]");
            DOPC.setAttribute("onclick", "deletar("+count+", 0);");
            div.appendChild(DOPC);
            var OPC = document.createElement("button");
            OPC.setAttribute("type", "button");
            OPC.textContent = "+";
            OPC.setAttribute("id", "buttonM"+count+"ckb");
            OPC.setAttribute("onclick", "document.getElementById('"+count+"').appendChild(geraInput("+count+",'ckb')); document.getElementById('"+count+"').appendChild(deleteButton("+count+",'ckb'));");
            OPC.setAttribute("style", "display:none");
            div.appendChild(OPC);
            
            var UE = document.createElement("input");
            UE.setAttribute("type", "text");
            UE.setAttribute("name", "pgt"+count+"[options][]");
            UE.setAttribute("id", "pgt"+count+"[options][0]");
            UE.setAttribute("disabled", "true");
            UE.setAttribute("style", "display:none");
            UE.setAttribute("placeholder", "Resposta...");
            UE.setAttribute("class", "pgt"+count+"radio");
            div.appendChild(UE);
            var DOPR = document.createElement("button");
            DOPR.setAttribute("class", "button"+count+"radio");
            DOPR.textContent = "-";
            DOPR.setAttribute("type", "button");
            DOPR.setAttribute("style", "display:none");
            DOPR.setAttribute("id", "button"+count+"[options][0]");
            DOPR.setAttribute("onclick", "deletar("+count+", 0);");
            div.appendChild(DOPR);
            var OPR = document.createElement("button");
            OPR.setAttribute("id", "buttonM"+count+"radio");
            OPR.textContent = "+";
            OPR.setAttribute("type", "button");
            OPR.setAttribute("onclick", "document.getElementById('"+count+"').appendChild(geraInput("+count+",'radio')); document.getElementById('"+count+"').appendChild(deleteButton("+count+",'radio'));");
            OPR.setAttribute("style", "display:none");
            div.appendChild(OPR);

            document.getElementsByTagName("form")[0].appendChild(div);
            count += 1;

        }
        function tipoPGT(tipo, local) {
            if (tipo == 0) {
                esconder = document.getElementById("pgt"+local+"textarea");
                esconder.style = "display:none;";
                esconder = document.getElementsByClassName("pgt"+local+"ckb");
                for (let index = 0; index < esconder.length; index++) {
                    const element = esconder[index];
                    element.style = "display:none;";
                    element.setAttribute("disabled", "true");   
                }
                esconder = document.getElementsByClassName("pgt"+local+"radio");
                for (let index = 0; index < esconder.length; index++) {
                    const element = esconder[index];
                    element.style = "display:none;";
                    element.setAttribute("disabled", "true");   
                }
                esconder = document.getElementsByClassName("button"+local+"radio");
                for (let index = 0; index < esconder.length; index++) {
                    const element = esconder[index];
                    element.style = "display:none;"; 
                }
                esconder = document.getElementsByClassName("button"+local+"ckb");
                for (let index = 0; index < esconder.length; index++) {
                    const element = esconder[index];
                    element.style = "display:none;";
                }
                esconder = document.getElementById("buttonM"+local+"radio");
                esconder.style = "display:none;";
                mostrar = document.getElementById("pgt"+local+"input");
                mostrar.style = "display:inline;";
            }else if (tipo == 1) {
                esconder = document.getElementById("pgt"+local+"input");
                esconder.style = "display:none;";
                esconder = document.getElementsByClassName("pgt"+local+"ckb");
                for (let index = 0; index < esconder.length; index++) {
                    const element = esconder[index];
                    element.style = "display:none;";
                    element.setAttribute("disabled", "true");   
                }
                esconder = document.getElementsByClassName("pgt"+local+"radio");
                for (let index = 0; index < esconder.length; index++) {
                    const element = esconder[index];
                    element.style = "display:none;";
                    element.setAttribute("disabled", "true");   
                }
                esconder = document.getElementsByClassName("button"+local+"radio");
                for (let index = 0; index < esconder.length; index++) {
                    const element = esconder[index];
                    element.style = "display:none;"; 
                }
                esconder = document.getElementsByClassName("button"+local+"ckb");
                for (let index = 0; index < esconder.length; index++) {
                    const element = esconder[index];
                    element.style = "display:none;";
                }
                esconder = document.getElementById("buttonM"+local+"radio");
                esconder.style = "display:none;";
                mostrar = document.getElementById("pgt"+local+"textarea");
                mostrar.style = "display:inline;";
            }else if (tipo == 2) {
                esconder = document.getElementById("pgt"+local+"textarea");
                esconder.style = "display:none;";
                mostrar = document.getElementsByClassName("pgt"+local+"ckb");
                for (let index = 0; index < mostrar.length; index++) {
                    const element = mostrar[index];
                    element.style = "display:inline;";
                    element.removeAttribute("disabled"); 
                }
                esconder = document.getElementsByClassName("pgt"+local+"radio");
                for (let index = 0; index < esconder.length; index++) {
                    const element = esconder[index];
                    element.style = "display:none;";
                    element.setAttribute("disabled", "true");   
                }
                esconder = document.getElementById("buttonM"+local+"radio");
                esconder.style = "display:none;";
                esconder = document.getElementById("pgt"+local+"input");
                esconder.style = "display:none;";
                esconder = document.getElementsByClassName("button"+local+"radio");
                for (let index = 0; index < esconder.length; index++) {
                    const element = esconder[index];
                    element.style = "display:none;";
                }
                mostrar = document.getElementById("buttonM"+local+"ckb");
                mostrar.style = "display:inline;";
                mostrar = document.getElementsByClassName("button"+local+"ckb");
                for (let index = 0; index < mostrar.length; index++) {
                    const element = mostrar[index];
                    element.style = "display:inline;";
                }
            }else if (tipo == 3) {
                esconder = document.getElementById("pgt"+local+"textarea");
                esconder.style = "display:none;";
                mostrar = document.getElementsByClassName("pgt"+local+"radio");
                for (let index = 0; index < mostrar.length; index++) {
                    const element = mostrar[index];
                    element.style = "display:inline;";
                    element.removeAttribute("disabled"); 
                }
                esconder = document.getElementsByClassName("pgt"+local+"ckb");
                for (let index = 0; index < esconder.length; index++) {
                    const element = esconder[index];
                    element.style = "display:none;";
                    element.setAttribute("disabled", "true");   
                }
                esconder = document.getElementById("buttonM"+local+"ckb");
                esconder.style = "display:none;";
                esconder = document.getElementById("pgt"+local+"input");
                esconder.style = "display:none;";
                esconder = document.getElementsByClassName("button"+local+"ckb");
                for (let index = 0; index < esconder.length; index++) {
                    const element = esconder[index];
                    element.style = "display:none;";
                }
                mostrar = document.getElementById("buttonM"+local+"radio");
                mostrar.style = "display:inline;";
                mostrar = document.getElementsByClassName("button"+local+"radio");
                for (let index = 0; index < mostrar.length; index++) {
                    const element = mostrar[index];
                    element.style = "display:inline;";
                }
            }
        }
        function deletar(local, opcao) {
            document.getElementById(local).removeChild(document.getElementById("pgt"+local+"[options]["+opcao+"]"));
            document.getElementById(local).removeChild(document.getElementById("button"+local+"[options]["+opcao+"]"));
            if (opcao != 0) {
                document.getElementById(local).removeChild(document.getElementById("BR"+local+opcao));
            }
        }
        function delpgt(local){
            document.getElementById("form").removeChild(document.getElementById(local));
        }
        document.addEventListener('DOMContentLoaded', (event) => {

        function handleDragStart(e) {
        this.style.opacity = '0.4';
        dragSrcEl = this;

        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/html', this.innerHTML);
        }

        function handleDragEnd(e) {
        this.style.opacity = '1';

        items.forEach(function (item) {
            item.classList.remove('over');
        });
        }

        function handleDragOver(e) {
        if (e.preventDefault) {
            e.preventDefault();
        }

        return false;
        }

        function handleDragEnter(e) {
        this.classList.add('over');
        }

        function handleDragLeave(e) {
        this.classList.remove('over');
        }

        let items = document.querySelectorAll('.container .box');
        items.forEach(function(item) {
            item.addEventListener('dragstart', handleDragStart);
            item.addEventListener('dragover', handleDragOver);
            item.addEventListener('dragenter', handleDragEnter);
            item.addEventListener('dragleave', handleDragLeave);
            item.addEventListener('dragend', handleDragEnd);
            item.addEventListener('drop', handleDrop);
        });
        });
        function handleDrop(e) {
            e.stopPropagation();

            if (dragSrcEl !== this) {
            dragSrcEl.innerHTML = this.innerHTML;
            this.innerHTML = e.dataTransfer.getData('text/html');
            }

            return false;
        }
    </script>

    </fieldset>
    <?php
    $vet = array();
    $count = 0;
    for ($i=0; $i <= count($_POST); $i++) { 
        if (isset($_POST["pgt".$i])) {
            array_push($vet, $_POST["pgt".$i]);
        }
    }
    montaForm($vet);
    function montaForm($perguntas){
        foreach ($perguntas as $value) {
            foreach ($value as $key1 => $value1) {
                /* var_dump($value);
                echo $value["pergunta"]; */
            if ($key1 == 'tipoP') {
                if ($value1 == 'rCurta') {
                    echo "<fieldset>";
                    echo $value['pergunta']."<br>";
                    echo "<input type='text' name='$value[pergunta]' id='$value[pergunta]'>";
                    echo "</fieldset>";
                }
                if ($value1 == 'rLonga') {
                    echo "<fieldset>";
                    echo $value['pergunta']."<br>";
                    echo "<textarea name='' id='' cols='30' rows='10'></textarea>";
                    echo "</fieldset>";
                }
                if ($value1 == "multEsc") {
                    echo "<fieldset>";
                    echo $value['pergunta']."<br>";
                    foreach ($value['options'] as $key => $value2) {
                        echo "<input type='checkbox' name='$value[pergunta]ckb[]' id='$value[pergunta]ckb[]' value='$value2'>$value2<br>";
                    }
                    echo "</fieldset>";
                }
                if ($value1 == "uniEsc") {
                    echo "<fieldset>";
                    echo $value['pergunta']."<br>";
                    foreach ($value['options'] as $key => $value2) {
                        echo "<input type='radio' name='".$value['pergunta']."rd[]' id='".$value['pergunta']."rd[]' value='$value2'>$value2<br>";
                    }
                    echo "</fieldset>";
                }
                if ($value1 == "sel") {
                    echo "<fieldset>";
                    echo $value['pergunta']."<br>";
                    echo "<select name='$value[pergunta]slc[]' id='$value[pergunta]slc[]'>";
                    foreach ($value['options'] as $key => $value2) {
                        echo "<option value='$value2'>$value2</option><br>";
                    }
                    echo "</select></fieldset>";
                }
            }
        }
        }
            
    }
    ?>

    </fieldset>
    
</body>
</html>