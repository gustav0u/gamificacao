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
    var fieldset = document.createElement("fieldset");
    fieldset.setAttribute("id", count);
    fieldset.setAttribute("dragabble", true);
    var SEPARADOR = document.createElement("hr");
    fieldset.appendChild(SEPARADOR);
    
    var PGT = document.createElement("input");
    PGT.setAttribute("type", "text");
    PGT.setAttribute("name", "pgt"+count+"[pergunta]");
    PGT.setAttribute("id", "pgt"+count+"[pergunta]");
    PGT.setAttribute("value", "Pergunta "+(parseInt(count)+1));

    var HIDDEN = document.createElement("input");
    HIDDEN.setAttribute("type", "hidden");
    HIDDEN.setAttribute("disabled", "");
    HIDDEN.setAttribute("id", "contador"+count);
    HIDDEN.value = 1;

    var SLC = document.createElement("select");
    SLC.setAttribute("type", "text");
    SLC.setAttribute("name", "pgt"+count+"[tipoP]");
    SLC.setAttribute("id", "pgt"+count+"[tipoP]");
    SLC.setAttribute("onChange", "tipoPGT('"+count+"')");
    
    var OPT0 = document.createElement("option");
    OPT0.setAttribute("value", "rCurta");
    OPT0.text = "Resposta Curta";
    
    var OPT1 = document.createElement("option");
    OPT1.setAttribute("value", "rLonga");
    OPT1.text = "Resposta Longa";

    var OPT2 = document.createElement("option");
    OPT2.setAttribute("value", "multEsc");
    OPT2.text = "Multipla Escolha";

    var OPT3 = document.createElement("option");
    OPT3.setAttribute("value", "uniEsc");
    OPT3.text = "Escolha Única";

    var OPT4 = document.createElement("option");
    OPT4.setAttribute("value", "slc");
    OPT4.text = "Caixas de Seleção";

    var OPT5 = document.createElement("option");
    OPT5.setAttribute("value", "date");
    OPT5.text = "Data";

    var OPT6 = document.createElement("option");
    OPT6.setAttribute("value", "time");
    OPT6.text = "Hora"

    var OPT7 = document.createElement("option");
    OPT7.setAttribute("value", "file");
    OPT7.text = "Arquivo"

    var OPT8 = document.createElement("option");
    OPT8.setAttribute("value", "scale");
    OPT8.text = "Escala"

    SLC.add(OPT0, SLC.options[0]);
    SLC.add(OPT1, SLC.options[1]);
    SLC.add(OPT2, SLC.options[2]);
    SLC.add(OPT3, SLC.options[3]);
    SLC.add(OPT4, SLC.options[4]);
    SLC.add(OPT5, SLC.options[5]);
    SLC.add(OPT6, SLC.options[6]);
    SLC.add(OPT7, SLC.options[7]);
    SLC.add(OPT8, SLC.options[8]);
    
    var CLONE = document.createElement("button");
    CLONE.setAttribute("type", "button");
    CLONE.setAttribute("id", "clone"+count);
    CLONE.setAttribute("onclick", "clone("+count+");");
    CLONE.setAttribute("style", "float:right;");
    CLONE.setAttribute("disabled", "true");
    CLONE.textContent = "DUPLICATE";

    var DELPGT = document.createElement("button");
    DELPGT.setAttribute("type", "button");
    DELPGT.setAttribute("id", "del"+count);
    DELPGT.setAttribute("onclick", "delpgt("+count+");");
    DELPGT.setAttribute("style", "float:right;");
    DELPGT.textContent = "DELETE";

    var BR = document.createElement("span");
    BR.innerHTML = "<br>";
    fieldset.appendChild(PGT);
    fieldset.appendChild(HIDDEN);
    fieldset.appendChild(SLC);
    fieldset.appendChild(DELPGT);
    fieldset.appendChild(CLONE);
    fieldset.appendChild(BR);

    var RC = document.createElement("input");
    RC.setAttribute("type", "text");
    RC.setAttribute("name", "pgt"+count+"input");
    RC.setAttribute("id", "pgt"+count+"input");
    RC.setAttribute("disabled", "true");
    RC.setAttribute("placeholder", "Resposta...");
    fieldset.appendChild(RC);   
    
    var RL = document.createElement("textarea");
    RL.setAttribute("name", "pgt"+count+"textarea");
    RL.setAttribute("id", "pgt"+count+"textarea");
    RL.setAttribute("disabled", "true");
    RL.setAttribute("style", "display:none");
    RL.setAttribute("placeholder", "Resposta...");
    fieldset.appendChild(RL);

    var ME = document.createElement("input");
    ME.setAttribute("type", "text");
    ME.setAttribute("name", "pgt"+count+"[options][]");
    ME.setAttribute("id", "pgt"+count+"[options][0]");
    ME.setAttribute("disabled", "true");
    ME.setAttribute("style", "display:none");
    ME.setAttribute("placeholder", "Resposta...");
    ME.setAttribute("class", "pgt"+count+"ckb");
    fieldset.appendChild(ME);
    var DOPC = document.createElement("button");
    DOPC.setAttribute("class", "button"+count+"ckb");
    DOPC.textContent = "-";
    DOPC.setAttribute("type", "button");
    DOPC.setAttribute("style", "display:none");
    DOPC.setAttribute("id", "button"+count+"[options][0]");
    DOPC.setAttribute("onclick", "deletar("+count+", 0);");
    fieldset.appendChild(DOPC);
    var OPC = document.createElement("button");
    OPC.setAttribute("type", "button");
    OPC.textContent = "+";
    OPC.setAttribute("id", "buttonM"+count+"ckb");
    OPC.setAttribute("onclick", "document.getElementById('"+count+"').appendChild(geraInput("+count+",'ckb')); document.getElementById('"+count+"').appendChild(deleteButton("+count+",'ckb'));");
    OPC.setAttribute("style", "display:none");
    fieldset.appendChild(OPC);
    
    var UE = document.createElement("input");
    UE.setAttribute("type", "text");
    UE.setAttribute("name", "pgt"+count+"[options][]");
    UE.setAttribute("id", "pgt"+count+"[options][0]");
    UE.setAttribute("disabled", "true");
    UE.setAttribute("style", "display:none");
    UE.setAttribute("placeholder", "Resposta...");
    UE.setAttribute("class", "pgt"+count+"radio");
    fieldset.appendChild(UE);
    var DOPR = document.createElement("button");
    DOPR.setAttribute("class", "button"+count+"radio");
    DOPR.textContent = "-";
    DOPR.setAttribute("type", "button");
    DOPR.setAttribute("style", "display:none");
    DOPR.setAttribute("id", "button"+count+"[options][0]");
    DOPR.setAttribute("onclick", "deletar("+count+", 0);");
    fieldset.appendChild(DOPR);
    var OPR = document.createElement("button");
    OPR.setAttribute("id", "buttonM"+count+"radio");
    OPR.textContent = "+";
    OPR.setAttribute("type", "button");
    OPR.setAttribute("onclick", "document.getElementById('"+count+"').appendChild(geraInput("+count+",'radio')); document.getElementById('"+count+"').appendChild(deleteButton("+count+",'radio'));");
    OPR.setAttribute("style", "display:none");
    fieldset.appendChild(OPR);

    var SLC = document.createElement("input");
    SLC.setAttribute("type", "text");
    SLC.setAttribute("name", "pgt"+count+"[options][]");
    SLC.setAttribute("id", "pgt"+count+"[options][0]");
    SLC.setAttribute("disabled", "true");
    SLC.setAttribute("style", "display:none");
    SLC.setAttribute("placeholder", "Resposta...");
    SLC.setAttribute("class", "pgt"+count+"slc");
    fieldset.appendChild(SLC);
    var DOPS = document.createElement("button");
    DOPS.setAttribute("class", "button"+count+"slc");
    DOPS.textContent = "-";
    DOPS.setAttribute("type", "button");
    DOPS.setAttribute("style", "display:none");
    DOPS.setAttribute("id", "button"+count+"[options][0]");
    DOPS.setAttribute("onclick", "deletar("+count+", 0);");
    fieldset.appendChild(DOPS);
    var OPS = document.createElement("button");
    OPS.setAttribute("id", "buttonM"+count+"slc");
    OPS.textContent = "+";
    OPS.setAttribute("type", "button");
    OPS.setAttribute("onclick", "document.getElementById('"+count+"').appendChild(geraInput("+count+",'slc')); document.getElementById('"+count+"').appendChild(deleteButton("+count+",'slc'));");
    OPS.setAttribute("style", "display:none");
    fieldset.appendChild(OPS);

    var SCLMIN = document.createElement("select");
    SCLMIN.setAttribute("name", "pgt"+count+"[options][min]");
    SCLMIN.setAttribute("id", "pgt"+count+"[options][min]");
    SCLMIN.setAttribute("class", "scale"+count+"min");
    SCLMIN.setAttribute("style", "display:none");
    for (let index = 0; index <= 1; index++) {
        var OPT = document.createElement("option");
        OPT.setAttribute("value", index);
        OPT.text = index;
        SCLMIN.add(OPT, SCLMIN.options[index]);
    }
    fieldset.appendChild(SCLMIN);
    var SCLMAX = document.createElement("select");
    SCLMAX.setAttribute("name", "pgt"+count+"[options][max]");
    SCLMAX.setAttribute("id", "pgt"+count+"[options][max]");
    SCLMAX.setAttribute("style", "display:none");
    SCLMAX.setAttribute("class", "scale"+count+"max");
    for (let index = 2; index <= 10; index++) {
        var OPT = document.createElement("option");
        OPT.setAttribute("value", index);
        OPT.text = index;
        SCLMAX.add(OPT, SCLMAX.options[index]);
    }
    fieldset.appendChild(SCLMAX);

    
    

    document.getElementById("form").appendChild(fieldset);
    count += 1;
}
function tipoPGT(local) {
    tipo = document.getElementById("pgt"+local+"[tipoP]").value;
    if (tipo == "rCurta") {
        input(true, local);
        textarea(false, local);
        ckb(false, local);
        radio(false, local);
        slc(false, local);
        scale(false, local);
    }else if (tipo == "rLonga") {
        input(false, local);
        textarea(true, local);
        ckb(false, local);
        radio(false, local);
        slc(false, local);
        scale(false, local);
    }else if (tipo == "multEsc") {
        input(false, local);
        textarea(false, local);
        ckb(true, local);
        radio(false, local);
        slc(false, local);
        scale(false, local);
    }else if (tipo == "uniEsc") {
        input(false, local);
        textarea(false, local);
        ckb(false, local);
        radio(true, local);
        slc(false, local);
        scale(false, local);
    }else if(tipo == "slc"){
        input(false, local);
        textarea(false, local);
        ckb(false, local);
        radio(false, local);
        slc(true, local);
        scale(false, local);
    }else if(tipo == "date"){
        input(true, local);
        date(local);
        textarea(false, local);
        ckb(false, local);
        radio(false, local);
        slc(false, local);
        scale(false, local);
    }else if(tipo == "time"){
        input(true, local);
        time(local);
        textarea(false, local);
        ckb(false, local);
        radio(false, local);
        slc(false, local);
        scale(false, local);
    }else if(tipo == "file"){
        input(true, local);
        file(local);
        textarea(false, local);
        ckb(false, local);
        radio(false, local);
        slc(false, local);
        scale(false, local);
    }else if(tipo == "scale"){
        input(false, local);
        scale(true, local);
        textarea(false, local);
        ckb(false, local);
        radio(false, local);
        slc(false, local);
    }
}
function deletar(local, opcao) {
    document.getElementById(local).removeChild(document.getElementById("pgt"+local+"[options]["+opcao+"]"));
    document.getElementById(local).removeChild(document.getElementById("button"+local+"[options]["+opcao+"]"));
    if (opcao != 0) {
        document.getElementById(local).removeChild(document.getElementById("BR"+local+opcao));
    }
}
function clone(local){
    var elementoOriginal = document.getElementById(local);
    var elementoClone = elementoOriginal.cloneNode(true);
    var filhos= elementoClone.childNodes;
    for (let index = 0; index < filhos.length; index++) {
        const element = filhos[index];
        if (element.id == "del"+local) {
            element.id = "del"+count;
            element.setAttribute("onclick", "delpgt("+count+");");
        }else if (element.id == "clone"+local) {
            element.id = "clone"+count;
            element.setAttribute("onclick", "clone("+count+");");
        }
    }
    elementoClone.id = count;
    document.getElementById("form").appendChild(elementoClone);
    
    count += 1;
}
function delpgt(local){
    document.getElementById("form").removeChild(document.getElementById(local));
}
function input(op, local){
    if (op) {
        mostrar = document.getElementById("pgt"+local+"input");
        mostrar.style = "display:inline;";
        mostrar.setAttribute("type", "text");
    }else{
        esconder = document.getElementById("pgt"+local+"input");
        esconder.style = "display:none;";
    }
}
function textarea(op, local){
    if (op) {
        mostrar = document.getElementById("pgt"+local+"textarea");
        mostrar.style = "display:inline;";
    }else{
        esconder = document.getElementById("pgt"+local+"textarea");
        esconder.style = "display:none;";
    }
}
function ckb(op, local){
    if (op) {
        mostrar = document.getElementById("buttonM"+local+"ckb");
        mostrar.style = "display:inline;";
        mostrar = document.getElementsByClassName("button"+local+"ckb");
        for (let index = 0; index < mostrar.length; index++) {
            const element = mostrar[index];
            element.style = "display:inline;";
        }
        mostrar = document.getElementsByClassName("pgt"+local+"ckb");
        for (let index = 0; index < mostrar.length; index++) {
            const element = mostrar[index];
            element.style = "display:inline;";
            element.removeAttribute("disabled"); 
        }
    }else{
        esconder = document.getElementById("buttonM"+local+"ckb");
        esconder.style = "display:none;";
        esconder = document.getElementsByClassName("pgt"+local+"ckb");
        for (let index = 0; index < esconder.length; index++) {
            const element = esconder[index];
            element.style = "display:none;";
            element.setAttribute("disabled", "true");   
        }
        esconder = document.getElementsByClassName("button"+local+"ckb");
        for (let index = 0; index < esconder.length; index++) {
            const element = esconder[index];
            element.style = "display:none;";
        }
    }
        
}
function radio(op, local){
    if (op) {
        mostrar = document.getElementById("buttonM"+local+"radio");
        mostrar.style = "display:inline;";

        mostrar = document.getElementsByClassName("button"+local+"radio");
        for (let index = 0; index < mostrar.length; index++) {
            const element = mostrar[index];
            element.style = "display:inline;";
        }
        mostrar = document.getElementsByClassName("pgt"+local+"radio");
        for (let index = 0; index < mostrar.length; index++) {
            const element = mostrar[index];
            element.style = "display:inline;";
            element.removeAttribute("disabled"); 
        }
    }else{
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
        esconder = document.getElementById("buttonM"+local+"radio");
        esconder.style = "display:none;";
    }
}
function slc(op, local){
    if (op) {
        mostrar = document.getElementById("buttonM"+local+"slc");
        mostrar.style = "display:inline;";
        mostrar = document.getElementsByClassName("button"+local+"slc");
        for (let index = 0; index < mostrar.length; index++) {
            const element = mostrar[index];
            element.style = "display:inline;";
        }
        mostrar = document.getElementsByClassName("pgt"+local+"slc");
        for (let index = 0; index < mostrar.length; index++) {
            const element = mostrar[index];
            element.style = "display:inline;";
            element.removeAttribute("disabled"); 
        }
    }else{
        esconder = document.getElementsByClassName("pgt"+local+"slc");
        for (let index = 0; index < esconder.length; index++) {
            const element = esconder[index];
            element.style = "display:none;";
            element.setAttribute("disabled", "true");   
        }
        esconder = document.getElementsByClassName("button"+local+"slc");
        for (let index = 0; index < esconder.length; index++) {
            const element = esconder[index];
            element.style = "display:none;"; 
        }
        esconder = document.getElementById("buttonM"+local+"slc");
        esconder.style = "display:none;";
    }
}
function date(local){
    INPUT = document.getElementById("pgt"+local+"input");
    INPUT.setAttribute("type", "date");
}
function time(local){
    INPUT = document.getElementById("pgt"+local+"input");
    INPUT.setAttribute("type", "time");
}
function file(local) {
    INPUT = document.getElementById("pgt"+local+"input");
    INPUT.setAttribute("type", "file");
}
function scale(op, local){
    if (op) {
        mostrar = document.getElementsByClassName("scale"+local+"min")[0];
        mostrar.style = "display:inline;";
        esconder.removeAttribute("disabled");
        mostrar = document.getElementsByClassName("scale"+local+"max")[0];
        mostrar.style = "display:inline;";
        esconder.removeAttribute("disabled");
    }else{
        esconder = document.getElementsByClassName("scale"+local+"min")[0];
        esconder.style = "display:none;";
        esconder.setAttribute("disabled", "true");
        esconder = document.getElementsByClassName("scale"+local+"max")[0];
        esconder.style = "display:none;"; 
        esconder.setAttribute("disabled", "true");
    }
    
}