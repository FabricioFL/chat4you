var signupFormStatus = false;

if(signupFormStatus === false)
{
    document.getElementById('signin').style.display = 'grid';
    document.getElementById('signup').style.display = 'none';
    document.getElementsByTagName('title')[0].innerText = 'Chat 4you | sign in';
}else
{
    document.getElementById('signin').style.display = 'none';
    document.getElementById('signup').style.display = 'grid';
    document.getElementsByTagName('title')[0].innerText = 'Chat 4you | sign up';
}

function switchFormStatus()
{
    if(signupFormStatus === false)
    {
        document.getElementById('signin').style.display = 'none';
        document.getElementById('signup').style.display = 'grid';
        document.getElementsByTagName('title')[0].innerText = 'Chat 4you | sign up';
        signupFormStatus = true;
    }
    else
    {
        document.getElementById('signin').style.display = 'grid';
        document.getElementById('signup').style.display = 'none';
        document.getElementsByTagName('title')[0].innerText = 'Chat 4you | sign in';
        signupFormStatus = false;
    }
}