no = 123;

//finding the last digit
lastDigit = no%10;

//getting the reverse of the original number 
while(no!=0)
{
    rem = no%10;
    rev = (rev*10) + rem;
    no = no/10;
}
//finding the first digit
firstDigit = rev%10;

//adding the first and last digit
addition = firstDigit + lastDigit


