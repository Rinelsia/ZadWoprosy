
function generateViewDb() {
    
    content.innerHTML = '<form action="" name="DB" method="post"> <input type="text"><input type="button" value="Кнопка"><button id="select-DB">выбрать базу данных</button></form>'
}
function generateViewTb() {
    
content.innerHTML ='<div class=""><p>Здесь будет прогружаться список таблиц. Создать отдельный файл загрузки таблиц и их управление, добавление и удаление информации в зависимости от баз данных</p></div>            <div class=""> <form action="" name="tabl" method="post">                    <button name="tabl_but">Создать таблицу</button>                </form></div>'
}
function puView(){
    var id1 = document.getElementById("id1");
    var id2 = document.getElementById("id2");
    var id3 = document.getElementById("id3");
    var content=document.getElementById("content");
    generateViewDb();
    id1.addEventListener("click",generateViewDb,false);
    id2.addEventListener("click",generateViewTb,false);
    id3.onclick = generateViewSt(content);
    console.log("id1");
}
puView();
