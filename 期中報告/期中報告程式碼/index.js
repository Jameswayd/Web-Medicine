
//CHEHSDADASDAS
function buzhidao() {



    var inputbox = document.getElementById('input')
    var input = inputbox.value
    inputbox.value = ""

    var element = document.getElementsByClassName('img-content')
    while (element.length > 0) {
        element[0].parentNode.removeChild(element[0]);
    }


    if (input == "") {
        alert("請輸入症狀")
    }
    else {


        var url = "item.json"
        // 申明一个XMLHttpRequest
        var request = new XMLHttpRequest();
        // 设置请求方法与路径
        request.open("get", url);
        // 不发送数据到服务器
        request.send(null);
        //XHR对象获取到返回信息后执行
        request.onload = function () {

            // 返回状态为200，即为数据获取成功
            if (request.status == 200) {

                var chaxun = JSON.parse(request.responseText);
                var parent;
                var data;
                if (input == "頭疼") {
                    parent = chaxun.頭疼
                    zhengzhuang(parent)
                }
                else if (input == "感冒") {
                    parent = chaxun.感冒
                    zhengzhuang(parent)

                }
                else if (input == "嘔吐") {
                    parent = chaxun.嘔吐
                    zhengzhuang(parent)
                }
                else if (input == "腹瀉") {
                    parent = chaxun.腹瀉
                    zhengzhuang(parent)
                    // data = parent[1]
                    // console.log(parent)
                    // x = data['Imodium']
                    // console.log(x[0]['chname'])


                } else {
                    yaoping(input, chaxun);
                }

                //获取jsonTip的div
                // var bodycontent = document.getElementById("bodycontent");


                // //存储数据的变量 

                // //清空内容 
                // var fragment = document.createDocumentFragment();


                // //将获取到的json格式数据遍历到div中
                // $.each(data, function (infoIndex, info) {


                //     //創建最外層的div
                //     var imgdiv = document.createElement('div');
                //     imgdiv.className = "img-content";
                //     //創建圖片
                //     var img = new Image();
                //     img.src = info["img"];
                //     img.className = "img";
                //     //創建文字框
                //     var text = document.createElement('div')
                //     text.className = "item-text";
                //     //創建label
                //     var textlabel = document.createElement('label');
                //     textlabel.className = "text";

                //     //把json檔文字放入label
                //     // textlabel.appendChild(document.createTextNode("中文名稱 <br> 英文名稱 : "));

                //     textlabel.appendChild(document.createTextNode("中文名稱： " + info["chname"] + "\n" + "英文名稱： " + info["egname"] + "\n" + "作用： " + info["effect"] + "\n" + "副作用： " + info["side_effect"] + "\n"));

                //     //把文字放入框内
                //     text.appendChild(textlabel);
                //     //把圖片和文字框放入外層div
                //     imgdiv.appendChild(img);
                //     imgdiv.appendChild(text);
                //     fragment.appendChild(imgdiv)
                //     //把外層div放入body内



                // })
                // bodycontent.appendChild(fragment);



                // //显示处理后的数据 
                // // imgcontent.appendChild(fragment)

            }



        }
    }


}

function zhengzhuang(parent) {//處理症狀的function
    var bodycontent = document.getElementById("bodycontent");


    //存储数据的变量 

    //清空内容 
    var fragment = document.createDocumentFragment();
    parent.forEach(child => {
        console.log(child)

        $.each(child, function (infoIndex, info) {
            console.log(info[0]['chname'])

            var imgdiv = document.createElement('div');
            imgdiv.className = "img-content";
            //創建圖片
            var img = new Image();
            img.src = info[0]["img"];
            img.className = "img";
            //創建文字框
            var text = document.createElement('div')
            text.className = "item-text";
            //創建label
            var textlabel = document.createElement('label');
            textlabel.className = "text";

            //把json檔文字放入label
            // textlabel.appendChild(document.createTextNode("中文名稱 <br> 英文名稱 : "));

            textlabel.appendChild(document.createTextNode("中文名稱： " + info[0]["chname"] + "\n" + "英文名稱： " + info[0]["egname"] + "\n" + "作用： " + info[0]["effect"] + "\n" + "副作用： " + info[0]["side_effect"] + "\n"));

            //把文字放入框内
            text.appendChild(textlabel);
            //把圖片和文字框放入外層div
            imgdiv.appendChild(img);
            imgdiv.appendChild(text);
            fragment.appendChild(imgdiv)
            //把外層div放入body内


        })
        bodycontent.appendChild(fragment);

    });
    console.log(parent[0])



}

function yaoping(input, chaxun) {
    var list = chaxun
    var bodycontent = document.getElementById("bodycontent");
    var fragment = document.createDocumentFragment();
    var data = true;

    $.each(list, function (infoIndex, info) {
        var parent = info

        for (var i = 0; i < parent.length; i++) {
            var parentl = parent[i]
            $.each(parentl, function (infoIndex, info) {
                var name = info[0]['egname']
                if (name == input) {
                    data = false;
                    var imgdiv = document.createElement('div');
                    imgdiv.className = "img-content";
                    //創建圖片
                    var img = new Image();
                    img.src = info[0]["img"];
                    img.className = "img";
                    //創建文字框
                    var text = document.createElement('div')
                    text.className = "item-text";
                    //創建label
                    var textlabel = document.createElement('label');
                    textlabel.className = "text";

                    //把json檔文字放入label
                    // textlabel.appendChild(document.createTextNode("中文名稱 <br> 英文名稱 : "));

                    textlabel.appendChild(document.createTextNode("中文名稱： " + info[0]["chname"] + "\n" + "英文名稱： " + info[0]["egname"] + "\n" + "作用： " + info[0]["effect"] + "\n" + "副作用： " + info[0]["side_effect"] + "\n"));

                    //把文字放入框内
                    text.appendChild(textlabel);
                    //把圖片和文字框放入外層div
                    imgdiv.appendChild(img);
                    imgdiv.appendChild(text);
                    fragment.appendChild(imgdiv)

                }


                bodycontent.appendChild(fragment);


            })



        }

    })

    if (data) {
        alert("查無資料");

    }








}
// $("#btn").click(function () {
//     console.log("hello")
//     // // 同文件夹下的json文件路径
//     // var url = "userinfo.json"
//     // // 申明一个XMLHttpRequest
//     // var request = new XMLHttpRequest();
//     // // 设置请求方法与路径
//     // request.open("get", url);
//     // // 不发送数据到服务器
//     // request.send(null);
//     // //XHR对象获取到返回信息后执行
//     // request.onload = function () {
//     //     // 返回状态为200，即为数据获取成功
//     //     if (request.status == 200) {
//     //         var data = JSON.parse(request.responseText);
//     //         console.log(data);
//     //         //获取jsonTip的div
//     //         var $jsontip = $("#jsonTip");
//     //         //存储数据的变量
//     //         var strHtml = "123";
//     //         //清空内容
//     //         $jsontip.empty();
//     //         //将获取到的json格式数据遍历到div中
//     //         $.each(data, function (infoIndex, info) {
//     //             // strHtml += "姓名：" + info["name"] + "<br>";
//     //             // strHtml += "性别：" + info["sex"] + "<br>";
//     //             // strHtml += "<hr>"
//     //         })
//     //         //显示处理后的数据
//     //         $jsontip.html(strHtml);
//     //     }
//     // }
// })

