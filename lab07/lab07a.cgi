#!/usr/bin/perl -wT
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);
print "Content-type: text/html\n\n";

my $html_content <<'END_HTML'; 
my $html_content = <<'END_HTML';
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Pacifico&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <title>Lab07 - CGI and Pearl</title>
    <style>
        h1 {
            text-align: center;
            font-family: "Oswald", sans-serif; 
            font-size: 4rem;
            color: red;
        }
    </style>
</head>
<body>
    <h1>This is my first Pearl Program</h1>
</body>
</html>
END_HTML

print $html_content; 