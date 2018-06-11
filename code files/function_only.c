#include<stdio.h>
 #include<math.h>

float getNumber ();

void getSum (float num1 ,float num2 ) ;

int main(void) {
float firstNumber;

int secondNumber;

firstNumber = getNumber();
secondNumber = getNumber();
float summation;

summation = getSum(firstNumber, secondNumber, );}

float getNumber (){

float num1;

printf("Enter the number to read ");
scanf("%f",&num1);
return num1;}
float getSum (float num1 ,float num2 ) {

int sum;

sum=num2+num1;
return num1;}