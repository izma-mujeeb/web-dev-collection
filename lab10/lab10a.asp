<html>
<head>
    <title>Problem 1</title> 
</head>
<body>
  <form action = "default.asp" method = "get">
      Enter a color: <input name = "color" type = "text"/>
      <input type = "submit">

  </form> 
  <%  
     colour = Request.QueryString("color")  
     response.write("<style>body { background-color: " & colour & "; }</style>")

     if request.cookies("lastVisit") <> "" then 
         lastVisit = request.cookies("lastVisit")
         response.write("Your last visit was on " & lastVisit)
     else 
         response.write("This is your first visit")
     end if

    dateAndTime = DateAdd("h",1,Now()) 
    response.cookies("lastVisit") = dateAndTime 
      
  %> 
</body>
</html>