#!/usr/bin/perl -wT
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);
use File::Basename; 
print "Content-type: text/html\n\n";

my $first_name = param('first'); 
my $last_name = param('last');

my $street_name = param('street-name');
my $city = param('city');
my $postal_code = param('postal-code');
my $province = param('province');

my $phone_number = param('phone-number');

my $email = param('email');

my $safe_filename_characters = "a-zA-Z0-9_.-"; 
my $upload_dir = "/home/imujeeb/public_html/upload"; 
my $query = new CGI; 
my $filename = $query->param("photo"); 
if ( !$filename ) { print $query->header ( ); print "There was a problem uploading your picture (try a smaller file)."; exit; } 
my ( $name, $path, $extension ) = fileparse ( $filename, '\..*' ); 
$filename = $name . $extension; 
$filename =~ tr/ /_/; 
$filename =~ s/[^$safe_filename_characters]//g; 

if ( $filename =~ /^([$safe_filename_characters]+)$/ ) { $filename = $1; } else { die "Filename contains invalid characters"; } 
my $upload_filehandle = $query->upload("photo"); 

open (UPLOADFILE, ">$upload_dir/$filename") or die "$!"; binmode UPLOADFILE; 
while ( <$upload_filehandle> ) { print UPLOADFILE; } 
close UPLOADFILE; 

print "<!DOCTYPE html>";
print "<html><head><title>Lab 07</title></head>";
print "<body>";

print "<p style = 'text-align: center; font-size: 2rem; color: purple; font-family: verdana;'>NAME: <span style = 'color: blue'>$first_name $last_name</span></p>";

print "<p style = 'text-align: center; font-size: 2rem; color: purple; font-family: verdana;'>STREET NAME: <span style = 'color: blue'>$street_name</span></p>";
print "<p style = 'text-align: center; font-size: 2rem; color: purple; font-family: verdana;'>CITY: <span style = 'color: blue'>$city</span></p>";

if ($postal_code =~ /^[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]$/) {
    print "<p style = 'text-align: center; font-size: 2rem; color: purple; font-family: verdana;'>POSTAL CODE: <span style = 'color: blue'>$postal_code</span></p>"; 
} else {
    print "<p style = 'text-align: center; font-size: 2rem; color: purple; font-family: verdana;'>Incorrect Postal Code </p>"; 
}

print "<p style = 'text-align: center; font-size: 2rem; color: purple; font-family: verdana;'>PROVINCE: <span style = 'color: blue'>$province</span></p>"; 

if ($phone_number =~ /^\d{10}$/) {
     print "<p style = 'text-align: center; font-size: 2rem; color: purple; font-family: verdana;'>PHONE NUMBER: <span style = 'color: blue'>$phone_number</span></p>"; 
} else {
    print "<p style = 'text-align: center; font-size: 2rem; color: purple; font-family: verdana;'>Incorrect Phone Number</p>";
}

if ($email =~ /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/) {
    print "<p style = 'text-align: center; font-size: 2rem; color: purple; font-family: verdana;'>EMAIL: <span style = 'color: blue'>$email</span></p>"; 
} else {
    print "<p style = 'text-align: center; font-size: 2rem; color: purple; font-family: verdana;'>Incorrect Email </p>";
}

print "<a style = 'font-size:2rem; color: black; text-decoration: none; border: 2px black solid; font-family: verdana;'href = 'https://www2.cs.torontomu.ca/~imujeeb/lab07/lab07b.html'>Go back to form!</a>";

print $query->header ( ); 
print "<img src='/upload/$filename'>";
print "</body></html>";