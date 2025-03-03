BLIND SQLI(my approach):
first we see the disallowed characters and keyword to check if it is blind sqli or not we use sleep
it resonds to it then it is a blind sqli so then we see that in the page it is said that we have to get the password(for a admin user)
then we try t give a true statment like ?pw=' || 1=1 -- - then we get an output like hello guest and we also query is displayed 
it says like id='guest' so if in the pw field we pass a true statement means we get logged into as hello guest 
then i try ?pw=' ||id='admin' %26%26 pw=' || 1=1 -- - like this it doesn't work now we have to get the password for id admin
now we have two way one we can manually check every character via the url or by writing a python script which check for the characters in the password
by this we can find the length http://localhost/sqli_challenge/index.php?pw=' || id='admin' %26%26 length(pw)=19#(the length of the password is 19) and the character by ?pw=' || id='admin' %26%26 SUBSTR(pw%2C x%2C 1)='y' --%20 by changing the x and y positions we cna get the chracters in the password x is the position a nd y is the charcters in that position
for python script give the range of the characters use for loop to iterate through each character in that position
we get the password as adminpwisasecret123

IDOR challenge(my approach):
after logging in i see the profile page then the url format 
then again i will loging with different username now again examine the url 
now i found that the parameter is changing according to the user loggin(sometimes we have to find the patterns to identify by applying some logic) then we come to the note that this id has something to do with the user login 
then i tried to manipulate it by changing the id values at some point or the other i was logged into a different profile of some other user then gave differnet values to the id again logged into different user(THIS IS IDOR VULNERBILITY)
by this we  the attacker could access sensitive information or perform actions on behalf of the other user, such as changing account settings or viewing private data.

COMMAND INJECTION(my approach):
here obivously there wil be a box to take the input when ever we see a input feild we try xss,sqli,command injection....
for this xss,sqli didn't give any output but for commands like ; ls , ;ls; i am getting some filenames so it has command injection vulnerbility 
see the names are filenames or directories if they are directories or folder go into it and search for the file by using command like ; ls challenges; if this again give anything check for that also until you get something useful 
then in the given filenames the flag may be stored so by googling we can get some command like ; find / -name flag.txt 2>/dev/null; # (as most commonly f;ag are stored with some common files name so in the place of flag.txt you can search any file you wnat the 2>/dev/null is to ignore the error messages in the output 
by doing soo we can get upto the flag

XSS(my approach):
first after login we see a comment box where you can comment things now the comments which you type is only shown to you but there are some users with some extra privilages who can see all the users comments 
now one of the privaleged user is admin so now we can get the admin cookie and can also get the privilages as th admin by changing our cookies ot the admin cookie
we try sqli,xss,command injection  but xss works so this website have xss vulnerbility 
now we have to get the value of the cookie we see the storage section there a cookie is_admin is set to know now to conform and check the value of the is_admin cookie for the admin we use js 
function checkAdminCookie() {
    const cookies = document.cookie.split(';');
    for (const cookie of cookies) {
        const [name, value] = cookie.trim().split('=');
        if (name === 'is_admin' && value === 'yes') {
            return true;
        }
    }
    return false;
}
if (checkAdminCookie()) {
    alert('Admin cookie found!');
} else {
    alert('Admin cookie not found.');
}
 or
 
function getUser Cookies() {
    const cookies = document.cookie.split(';');
    const userCookies = {};
    cookies.forEach(cookie => {
        const [name, value] = cookie.trim().split('=');
        if (name.startsWith('user_') || name === 'session_id') {
            userCookies[name] = decodeURIComponent(value);
        }
    });

    return userCookies;
}
const loggedInUser Cookies = getUser Cookies();
console.log(loggedInUser Cookies);

we get the values of the cookies if the pop box say admin cookie found means that is the cookie for the admin and it also specifies the value of the admin cookie(yes)
by this way we are stealing the cookies from the admin
now if we change the is_admin value of our cookie manually or by terminal(curl -v -b "cookie_name=cookie_value" http://localhost/xss_damn/some_endpoint.php) we get the admin privilages i.e to see all the comments
