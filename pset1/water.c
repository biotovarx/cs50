#include<cs50.h>
#include<stdio.h>

int main(void)
{
    int bottles;
    printf("Please provide the number of minutes you spend in the shower:");
    int time_min=GetInt();
    bottles = time_min*12;
    printf("You use %d bottles for your shower!\n", bottles);
}