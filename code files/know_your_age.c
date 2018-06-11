#include <stdio.h>
#include <math.h>
 
 #DEFINE CURRENTYEAR 2015

int main(void) {
int yearOfBirth;

printf("Enter your year of Birth");
scanf("%d",&yearOfBirth);
int number_of_years;

number_of_years=CURRENTYEAR-yearOfBirth;
printf("Your year of birth is %d and your age is %d", yearOfBirth, number_of_years);}
