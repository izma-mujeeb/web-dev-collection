#!/usr/bin/python
print("Content-type:text/html\n\n")  
import cgi 
form = cgi.FieldStorage()  

city = form.getvalue('city') 
province = form.getvalue('province')
country = form.getvalue('country')
url = form.getvalue('url')  

print("<h1 style = 'text-align: center; color: purple; background-color: black; font-family: verdana; font-size: 3rem; height: 100px;' >")
print(city.capitalize())
print(country.capitalize()) 
print("</h1>")  

print("<h2 style = 'text-align: center; color: pink; background-color: purple; font-family: verdana; font-size: 2em; height: 100px;' > Province: ")
print(province.capitalize()) 
 
print("<img style = 'width: 80%; border: 5px red solid;' src = '{}' />".format(url)) 



