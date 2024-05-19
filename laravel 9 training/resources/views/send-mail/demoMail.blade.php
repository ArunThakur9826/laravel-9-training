<!DOCTYPE html>
<html>
<head>
    <title>arunthakur</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>
        <p>email => {{ $mailData['mail'] }}</p>
    <h2>subject => {{ $mailData['subject'] }}</h2>
    <p>message => {{ $mailData['message'] }}</p>
  
  
    <p>Hii {{ $mailData['name'] }} Thanxx for subscriber</p>
</body>
</html>