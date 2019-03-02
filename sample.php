  <!DOCTYPE html>
    <html>
    <script>
    function getMultipleSelectedValue()
    {
      var x=document.getElementById("alpha");
      for (var i = 0; i < x.options.length; i++) {
         if(x.options[i].selected ==true){
          var a = x.options[i].value;

          // var data = [1,2];
          // data.push(a);
          // // alert(a);
          // console.log(data);
          
            
          }

      }
      return a;
          

    }

function aj(a) {
  console.log(a);

}
aj();

    </script>
    </head>
    <body>
    <select multiple="multiple" id="alpha">
      <option value="a">A</option>
      <option value="b">B</option>
      <option value="c">C</option>
      <option value="d">D</option>
    </select>
    <input type="button" value="Submit" onclick="getMultipleSelectedValue()"/>
    </body>
    </html>