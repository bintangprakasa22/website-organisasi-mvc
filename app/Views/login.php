<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portal Organisasi</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            color: #ffffff;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            padding: 40px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            width: 100%;
            max-width: 350px;
            text-align: center;
        }
        .login-container h2 {
            margin-top: 0;
            margin-bottom: 30px;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            color: #ccc;
        }
        .input-group input {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            box-sizing: border-box;
            transition: 0.3s;
        }
        .input-group input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }
        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #4CAF50;
            color: white;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.3s, transform 0.1s;
        }
        .btn:hover {
            background: #45a049;
        }
        .btn:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>PORTAL ORGANISASI</h2>
        <form action="/organisasi_uts/auth/prosesLogin" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required autocomplete="off">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Masuk</button>
        </form>
    </div>
</body>
</html>