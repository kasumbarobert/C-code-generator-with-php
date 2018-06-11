#include <stdio.h>
#include <math.h>


int main(void) {
int number;

printf("Enter the number to test to see what happens when divide by 3: ");
scanf("%d",&number);
switch(number%3) {
case 0 :
printf("The number is exactly divisible by 3\n");break;
case 1 :
printf("The number you entered gives a remainder of 1 when divided by 3 \n");break;
case 3 :break;
default :break;}}
