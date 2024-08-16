<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
        <h2 class="text-2xl font-bold mb-4">Verify Your Email Address</h2>
        
        @if (session('resent'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4 rounded" role="alert">
                A fresh verification link has been sent to your email address.
            </div>
        @endif
        
        <p class="mb-4">Before proceeding, please check your email for a verification link.</p>
        
        <p class="mb-4">If you did not receive the email,</p>
        
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="text-blue-500 underline hover:text-blue-600 focus:outline-none">click here to request another</button>.
        </form>
    </div>

</body>
</html>
