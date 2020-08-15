
#include <stdio.h>
#include <cs50.h>
#include <math.h>

int main(void)
{
    float user_change;
    int coincount=0;
    
    printf("Enter how much change is owed:\n");
    
    do
    {
        user_change = GetFloat();
        if(user_change<=0)
        {
            printf("The amount of change owed must be a positive number!\n");

        }
    } while(user_change <=0);
    
    int changeincents = round(user_change*100);
    while(changeincents>=25)
    {
        changeincents-=25;
        coincount++;
 
    }
    while(changeincents>=10)
    {
        changeincents-=10;
        coincount++;

    }
    while(changeincents>=5)
    {
        changeincents-=5;
        coincount++;
        
    }
    while(changeincents>=1)
    {
        changeincents-=1;
        coincount++;
    }
    
    printf("%d\n",coincount);
    

}