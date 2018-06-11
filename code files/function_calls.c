#include<stdio.h>
 #include<math.h>

float getSquare (float number_to_square ) ;

float ReadNumbers ();

int main(void) {
float sum1;

float square1;

sum1 = ReadNumbers();
square1 = getSquare(sum1, )
printf("The square of the numbers entered is %f ", square1);}

float getSquare (float number_to_square ) {

return number_to_square*number_to_square ;}
float ReadNumbers (){

float num1;

float num2;

float num3;

printf("Enter the first Number:");
scanf("%f",&num1);
printf("Enter the second Number");
scanf("%f",&num2);
printf("Enter the third(last) number ");
scanf("%f",&num3);
return num1+num2+num3 ;}