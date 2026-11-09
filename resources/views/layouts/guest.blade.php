<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aura Luxury Spa - Authentication</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #171717 !important;
            color: #f5f5f5 !important;
            margin: 0;
            font-family: ui-sans-serif, system-ui, sans-serif;
        }
        
        /* Input Field Styling with distinct color to prevent white flash */
        .auth-input {
            width: 100% !important;
            background-color: #2b2b2b !important;
            color: #ffffff !important;
            border: 1px solid #4a4a4a !important;
            border-radius: 8px !important;
            padding: 12px 14px !important;
            font-size: 14px !important;
            outline: none !important;
            box-sizing: border-box;
            margin-top: 6px;
            transition: border-color 0.2s ease-in-out;
        }

        .auth-input:focus, 
        .auth-input:active {
            background-color: #2b2b2b !important;
            color: #ffffff !important;
            border-color: #E8B4BC !important;
        }

        /* Autofill override for Chrome/Edge */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus {
            -webkit-text-fill-color: #ffffff !important;
            -webkit-box-shadow: 0 0 0px 1000px #2b2b2b inset !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        .auth-label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            color: #d4d4d4;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body style="background-color: #171717; min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 16px sm:padding: 24px;">

    <!-- Brand Header -->
    <div style="text-align: center; margin-bottom: 24px;">
        <a href="{{ route('home') }}" style="font-size: 26px; sm:font-size: 30px; font-family: serif; font-weight: bold; letter-spacing: 2px; color: #E8B4BC; text-decoration: none;">
            AURA
        </a>
        <span style="font-size: 10px; letter-spacing: 2px; sm:letter-spacing: 3px; color: #a3a3a3; text-transform: uppercase; display: block; margin-top: 4px;">Spa & Salon Administration</span>
    </div>

    <!-- Main Card Box -->
    <div style="width: 100%; max-width: 400px; background-color: #1f1f1f; border: 1px solid #2e2e2e; border-radius: 16px; padding: 24px; sm:padding: 32px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.6); box-sizing: border-box;">
        {{ $slot }}
    </div>

    <!-- Back to Home Link -->
    <div style="margin-top: 24px; text-align: center;">
        <a href="{{ route('home') }}" style="font-size: 12px; color: #a3a3a3; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#E8B4BC'" onmouseout="this.style.color='#a3a3a3'">← Back to Website</a>
    </div>

</body>
</html>