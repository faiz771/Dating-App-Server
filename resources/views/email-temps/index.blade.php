<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            list-style: none;
            font-family: sans-serif;
        }

        .wrapper-haq-class {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main {
            padding: 20px 30px;
            box-shadow: #838BA5 0px 48px 100px 0px;
            width: 500px;
            height: 500px;
            border-radius: 8px;
        }

        .main h2 {
            font-size: 25px;
            text-align: center;
            text-transform: capitalize;
        }

        .main div p {
            font-weight: 300;
            color: rgb(105, 105, 105);
            font-size: 18px;
            margin: 20px 0px;
            text-align: justify;
        }

        .password-recory-div {
            display: flex;
            gap: 50px;
        }

        .main .go-side-btn {
            margin: 20px 0px;
            display: flex;
            justify-content: center;
        }

        .main .go-side-btn button {
            padding: 9px 20px;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            font-size: 19px;
            background-color: #35628C;
            color: #fff;
        }

        .main .go-side-btn button:hover {
            opacity: 0.9;
        }

        .main .go-side-btn button:focus {
            box-shadow: #0B3948 0px 6px 12px -2px, #838BA5 0px 3px 7px -3px;
        }

        @media(max-width:400px) {
            .main {
                width: 100%;
                height: auto;
            }
        }

        @media(max-width:280px) {
            .main {
                word-break: break-all;
            }
        }

    </style>
</head>

<body>
    <div class="wrapper-haq-class">

        <div class="main">
            <h2>Hello Zohaib</h2>
            <div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae neque quo, laborum nam, rem
                    consectetur hic excepturi pariatur libero, dolores consequatur. Iure natus ea commodi velit eveniet
                    quas neque corrupti!
                </p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae neque quo, laborum nam, rem
                    consectetur hic excepturi pariatur libero, dolores consequatur. Iure natus ea commodi velit eveniet
                    quas neque corrupti!
                </p>
            </div>
            <div class="password-recory-div">
                <p>Password</p>
                <p>3(*^33aadffg</p>
            </div>
            <div class="go-side-btn">

                <button type="button">go site</button>
            </div>

        </div>
    </div>
</body>

</html>
