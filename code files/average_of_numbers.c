#include<stdio.h>
 #include<math.h>

int main(void) {
int sum=0;

int number;

int i;

i=0;
number=1;while(number!=0){
i++;
printf("Enter number %i, Enter 0 to end");
scanf("%d",&number);
sum=sum+number;}
printf("The sum of %d numbers is %d ", i, sum);}}}}}}
float average;

average=sum/i;
printf("\n The average of the %i numbers is %f", average);
