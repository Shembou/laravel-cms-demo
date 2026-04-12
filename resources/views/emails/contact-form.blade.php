<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #7C3AED 0%, #8B5CF6 100%); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { background: #fff; padding: 30px; border: 1px solid #e5e7eb; }
        .field { margin-bottom: 20px; }
        .field strong { color: #7C3AED; }
        .footer { background: #f9fafb; padding: 20px; text-align: center; font-size: 12px; color: #6b7280; border: 1px solid #e5e7eb; border-radius: 0 0 10px 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nowa prośba o demo BoxFlow</h1>
        </div>

        <div class="content">
            <p>Otrzymałeś nową prośbę o demo przez formularz kontaktowy:</p>

            <div class="field">
                <strong>Imię i nazwisko:</strong><br>
                {{ $name }}
            </div>

            <div class="field">
                <strong>Adres e-mail:</strong><br>
                <a href="mailto:{{ $email }}">{{ $email }}</a>
            </div>

            <div class="field">
                <strong>Numer telefonu:</strong><br>
                {{ $phoneNumber }}
            </div>

            <div class="field">
                <strong>NIP firmy:</strong><br>
                {{ $nip }}
            </div>
        </div>

        <div class="footer">
            <p>Wiadomość wysłana z formularza kontaktowego BoxFlow</p>
            <p>{{ now()->format('d.m.Y H:i') }}</p>
        </div>
    </div>
</body>
</html>