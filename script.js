function ColorMode()
{
    
    const cookieValue = document.cookie
  .split('; ')
  .find((row) => row.startsWith('ColorMode='))
  ?.split('=')[1];

    if(cookieValue=="Light")
    {
        document.cookie="ColorMode = Dark "+";expires="+new Date(new Date().getTime()+60*60*1000*24*730).toGMTString();
    }
    else
    {
        document.cookie="ColorMode = Light"+";expires="+new Date(new Date().getTime()+60*60*1000*24*920).toGMTString();
    }
}


   function ToggleContent(contents)
   {
    let content = document.getElementById("content");
        if(content.childElementCount>0)
        {
            content.removeChild(content.firstChild);
            console.log("ds");
        }
        content.insertAdjacentHTML("afterbegin",'<iframe width="560" height="315" src="'+contents+'" allow="accelerometer; autoplay; picture-in-picture" allowfullscreen></iframe>');

    }
    
   
  