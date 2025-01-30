#!/usr/bin/ruby -wT
require 'cgi'
cgi = CGI.new
puts "Content-type: text/html\n\n"

city = cgi['city']
province = cgi['province'] 
country = cgi['country']
url = cgi['url'] 

print "Content-type: text/html\n\n"

print <<~HTML 
    <html> 
        <body>
            <h1 style = "text-align: center; color: pink; background-color: purple; font-family: verdana; font-size: 3rem; height: 100px;">#{city.capitalize} #{country.capitalize} </h1> 
            <h2 style = "text-align: center; color: pink; background-color: purple; font-family: verdana; font-size: 3rem; height: 100px;"> Province: #{province.capitalize} </h2> 
            <img style = "width: 100%" src = #{url}>
        </body>
    </html>

HTML
