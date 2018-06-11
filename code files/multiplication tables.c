/*Multiplication table*/
#include <stdio.h>
#include <math.h>


int main(void) {
int n;

int i;

printf("Enter the number ");
scanf("%d",&n);
i = 1;
int d;
while(i <= 10){
d=i*n;
printf("%d x %d = %d", n, i, d);
printf("\n");}}
