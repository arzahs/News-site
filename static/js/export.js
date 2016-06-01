/*
 Для добавление списка новостей на свой сайт, необходимо создать div с id='container',
 или переприсвоить с помощью newsExporter.setContainer(elm) - функция принимает элемент DOMa.
 И потом вызвать функцию newsExporter.init(), которая выполнит всю работу за вас.
 */
var newsExporter = (function(){
    var xhr = new XMLHttpRequest();
    var _container = document.getElementById('container');
    xhr.open('GET', 'http://mysite.loc/news/all.json', false);
    xhr.send();
    var jsonData;

    function _getData(){
        if (xhr.status != 200) {
            alert('Ошибка сервера, повторите позже');
            return false;
        } else {
            jsonData = xhr.responseText;
        }

        return JSON.parse(jsonData);

    }


    function _constructOutput(data){
        data.forEach(function(item, i, data){
            var div = document.createElement('div');
            var title = document.createElement('a');
            title.href = 'http://mysite.loc/news/view/'+item['id'];
            title.innerHTML = item['title'];
            var text = document.createElement('p');
            text.innerHTML = item['article'];
            var text = document.createElement('p');
            text.innerHTML = item['article'];

            var date = document.createElement('time');
            date.datetime = item['date'];
            date.innerHTML = '<br>Опубликовано: '+ item['date']+'<br>';


            div.appendChild(title);
            div.appendChild(date);
            div.appendChild(text);
            _container.appendChild(div);
        });
    }

    return {
        init : function(){
            _constructOutput(_getData());
        },
        setContainer: function(elm){
            _container = elm;
        }

    }

}());
