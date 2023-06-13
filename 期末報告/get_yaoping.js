function sendDataToPhp() {
    var inputbox = document.getElementById('input').value;
    var input = inputbox;
    inputbox = "";
    sessionStorage.setItem('input', input)
    $.ajax({
        url: "http://localhost/Web-Medicine/suibiancheshi/yaoping.php",
        method: "POST",
        data: { value: input },
        success: function (response) {
            let str = response;
            let delimiter = '[';

            let result = str.split(delimiter).pop().trim();

            let data = delimiter + result

            let jsonData = JSON.parse(data);
            showItem(jsonData);
        },
        error: function (xhr, status, error) {
            console.error("AJAX 錯誤: " + error);
        }
    });
}


function showItem(jsonData) {
    var jasonData = jsonData;
    console.log(jasonData);
    var bodycontent = document.getElementById("bodycontent");
    var fragment = document.createDocumentFragment();
    for (var i = 0; i < jasonData.length; i++) {
        var item = jasonData[i];

        var imgdiv = document.createElement('div');
        imgdiv.className = "img-content";

        var img = new Image();
        img.src = item.img;
        img.className = "img";

        var text = document.createElement('div');
        text.className = "item-text";

        var textlabel = document.createElement('label');
        textlabel.className = "text";

        textlabel.appendChild(document.createTextNode("chname: " + item.chname + "\n" + "egname: " + item.egname + "\n" + "effect: " + item.effect + "\n" + "side_effec: " + item.side_effect + "\n"));

        text.appendChild(textlabel);
        imgdiv.appendChild(img);
        imgdiv.appendChild(text);
        fragment.appendChild(imgdiv)

    }
    bodycontent.appendChild(fragment);




}