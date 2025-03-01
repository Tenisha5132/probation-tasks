Path traversal is also known as directory traversal. These vulnerabilities enable an attacker to read arbitrary files on the server that is running an application
 This might include:
Application code and data.
Credentials for back-end systems.
Sensitive operating system files.
In some cases, an attacker might be able to write to arbitrary files on the server, allowing them to modify application data or behavior, and ultimately take full control of the server.
 The sequence ../ is valid within a file path, and means to step up one level in the directory structure. The three consecutive ../ sequences Ex: /var/www/images/ to the filesystem root, and so the file that is actually read is:/etc/passwd
  On Unix-based operating systems, this is a standard file containing details of the users that are registered on the server, but an attacker could retrieve other arbitrary files using the same technique.

On Windows, both ../ and ..\ are valid directory traversal sequences. The following is an example of an equivalent attack against a Windows-based server:
https://insecure-website.com/loadImage?filename=..\..\..\windows\win.ini

Many applications that place user input into file paths implement defenses against path traversal attacks. These can often be bypassed.

If an application strips or blocks directory traversal sequences from the user-supplied filename, it might be possible to bypass the defense using a variety of techniques.

You might be able to use nested traversal sequences, such as ....// or ....\/. These revert to simple traversal sequences when the inner sequence is stripped.
this explanation: ested Traversal Sequences=> This refers to combining different types of traversal sequences within one another.or example, if you have two XPath(XPath (XML Path Language) is a query language used to select nodes from an XML document) expressions, one could be used inside another, forming a nested structure. In a nested sequence, the inner expression is evaluated first and then the outer expression acts upon the result of the inner one.
....// or ....\/:
//: In XPath, this is used for "descendant-or-self" traversal. It means to select elements at any depth within the document, starting from the context node.
For example, //div selects all <div> elements in the entire document, regardless of where they are located in the structure.
\/: This seems to be a typo or a shorthand, but it likely refers to /, which is used for "child" traversal. It selects elements that are direct children of the current node.For example, /html/body selects the <body> element that is a direct child of the <html> element.
XML stands for Extensible Markup Language. It is a markup language designed to store and transport data in a structured, human-readable format. XML allows you to define custom tags to describe the data, making it flexible and adaptable for various types of data.
In some contexts, such as in a URL path or the filename parameter of a multipart/form-data request, web servers may strip any directory traversal sequences before passing your input to the application. You can sometimes bypass this kind of sanitization by URL encoding, or even double URL encoding, the ../ characters. This results in %2e%2e%2f and %252e%252e%252f respectively. Various non-standard encodings, such as ..%c0%af or ..%ef%bc%8f, may also work.
An application may require the user-supplied filename to end with an expected file extension, such as .png. In this case, it might be possible to use a null byte to effectively terminate the file path before the required extension. For example: filename=../../../etc/passwd%00.png

TO PREVENT PATH TRANSVERSAL:
is to avoid passing user-supplied input to filesystem APIs altogether. Many application functions that do this can be rewritten to deliver the same behavior in a safer way. 
If you can't avoid passing user-supplied input to filesystem APIs=>
Validate the user input before processing it. Ideally, compare the user input with a whitelist of permitted values. If that isn't possible, verify that the input contains only permitted content, such as alphanumeric characters only. 
After validating the supplied input, append the input to the base directory and use a platform filesystem API to canonicalize the path. Verify that the canonicalized path starts with the expected base directory. 

lab-1 => file path tranversal, simple case 
../../../etc/passwd
lab-2 =>file path tranversal, traversal sequence blocked with absolute path bypass
Modify the filename parameter, giving it the value /etc/passwd. 
lab-3 => file path transversal, traversal sequence stripped non-recursively(This likely means that the traversal should be interpreted without going deeper into the directory structure recursively. Instead, it should be treated as a flat sequence of directory changes.)
....//....//....//etc/passwd
lab-4 => file path transversal sequence stripped with superfluous url-decode
lab-5 => File path traversal, validation of start of path
/var/www/images/../../../etc/passwd
lab-6 => File path traversal, validation of file extension with null byte bypass
../../../etc/passwd%0067.jpg
