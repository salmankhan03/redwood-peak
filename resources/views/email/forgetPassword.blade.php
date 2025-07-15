<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset - Redwood Peak</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 200px;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 30px;
        }
        .reset-button {
            display: inline-block;
            background-color: #511515;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 20px 0;
        }
        .reset-button:hover {
            background-color: #3d0f0f;
        }
        .security-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-left: 4px solid #511515;
            margin: 20px 0;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 14px;
        }
        .divider {
            border-top: 1px solid #eee;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="color: #511515; margin-bottom: 10px;">Password Reset Request</h1>
        </div>

        <div class="content">
            <p>Hello,</p>
            
            <p>We received a request to reset your password for your Redwood Peak account. If you made this request, please click the button below to reset your password:</p>
            
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ $url }}" class="reset-button">Reset Password</a>
            </div>
            
            <p>If the button above doesn't work, you can also copy and paste the following link into your browser:</p>
            <p style="word-break: break-all; background-color: #f8f9fa; padding: 10px; border-radius: 5px; font-family: monospace;">{{ $url }}</p>
        </div>

        <div class="security-info">
            <h3 style="margin-top: 0; color: #511515;">Security Information</h3>
            <ul style="margin-bottom: 0;">
                <li>If you didn't request this password reset, please ignore this email</li>
                <li>Your password won't be changed until you click the link above and create a new one</li>
            </ul>
        </div>

        <div class="divider"></div>

        <div class="footer">
            <p>If you're having trouble with the link above, contact our support team.</p>
            <p style="margin-top: 20px;">
                <strong>Redwood Peak</strong><br>
                This email was sent from an automated system. Please do not reply to this email.
            </p>
        </div>
    </div>
</body>
</html>