<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>登入</title>
</head>

<body>
    <form role="form" action="login.php" method="post">
        <div id="app">
            <div class="row mx-5 mt-5 mb-1">
                <div class="col-12">
                    <?php
                    // 檢查是否有 error 參數
                    if (isset($_GET['error']) && $_GET['error'] == 1) {
                        echo '<div class="alert alert-danger" role="alert" >登入失敗，請檢查您的帳號和密碼。</div>';
                    }
                    ?>
                </div>
            </div>
            <div class="row m-5 mt-2">
                <div class="col-4 mt-5">
                    <div class="card" style="border-style:none;">
                        <img src="picture/Medicine.jpg" class="card-img-top" style="margin-top: 100px" alt="Medicine">
                    </div>
                </div>
                <div class="col-8 mt-5">
                    <div class="card mt-5" style="border-style:none;">
                        <div class="card-body">
                            <h1 class="m-3 d-grid gap-2 m-5" style="text-align:center;">藥品查詢網站</h1>
                            <div class="form-floating m-5">
                                <input v-model="form.account" type="text" class="form-control" id="Input" name="email"  placeholder="請輸入帳號">
                                <label for="floatingInput">帳號</label>
                            </div>
                            <div class="form-floating m-5">
                                <input v-model="form.password" type="password" class="form-control" id="Password" name="password"  placeholder="請輸入密碼">
                                <label for="floatingPassword">密碼</label>
                            </div>
                            <div class="m-3 d-grid gap-2 m-5">
                                <button type="submit" class="btn btn-info" >
                                    登入
                                </button>
                                <button type="button" class="btn btn-info" onclick="window.location.href='account1.html'">
                                    建立帳號
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>

        /* var user = {
                'abcd': 1234,
                'aaaa': 1111,
                'bbbb': 2222,
            }

            const userloginbtn = document.getElementById("floatingInput");
            const passwordloginbtn = document.getElementById("floatingPassword");
            userloginbtn.addEventListener('keydown', function (event) {
                if (event.keyCode === 13) {
                    login()
                }
            })
            passwordloginbtn.addEventListener('keydown', function (event) {
                if (event.keyCode === 13) {
                    login()
                }
            })

            function login() {
                console.log("hello")
                var usern = document.getElementById("floatingInput");
                var username = usern.value;
                var userp = document.getElementById("floatingPassword");
                var userpassword = userp.value;
                console.log(username)
                console.log(userpassword)
                if (username in user) {
                    if (userpassword == user[username]) {
                        window.location.href = 'chaxun.html';
                    }



                    else {
                        alert("密碼錯誤")
                    }

                } else {
                    alert("帳號錯誤")
                }
                usern.value = "";
                userp.value = "";


            }*/
    </script>
</body>