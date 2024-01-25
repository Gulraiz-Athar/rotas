<html>
   <head>
   </head>
   <body>
      <div style="background-color:#f8f8f8">
         <p>Your request to leave from {{ $date }} is {{ $response }} by {{ $by }}.</p>
         <br><br><br>
         <p>Thanks,</p>
        <p>{{ env('MAIL_FROM_NAME','Admin') }}</p>
        </div>
   </body>
</html>
