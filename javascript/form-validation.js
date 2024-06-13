$(function()
{
    $("form[name='unos_clanka']").validate
    ({
      rules: 
      {
        title: 
        {
          required: true,
          minlength: 5,
          maxlength: 30,
        },
        about: 
        {
          required: true,
          minlength: 10,
          maxlength: 100,
        },
        content:
        {
          required: true,
        },
        pphoto:
        {
          required: true,
        },
        category:
        {
          required: true,
        },
      },

      messages: 
      {
        title: 
        {
          required: "Naslov vijesti nesmije biti prazan",
          minlength: "Naslov vijesti mora imati 5 do 30 znakova",
          maxlength: "Naslov vijesti mora imati 5 do 30 znakova",
        },
        about: 
        {
          required: "Kratki sadržaj nesmije biti prazan",
          minlength: "Kratki sadržaj vijesti mora imati 10 do 100 znakova",
          maxlength: "Kratki sadržaj vijesti mora imati 10 do 100 znakova",
        },
        content:
        {
          required: "Tekst vijesti nesmije biti prazan",
        },
        pphoto:
        {
          required: "Slika mora biti odabrana",
        },
        category:
        {
          required: "Kategorija mora biti odabrana",
        }
     },

      submitHandler: function(form) 
      {
        form.submit();
      }
    });
  });
