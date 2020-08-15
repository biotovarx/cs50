


#include <stdio.h>
#include <cs50.h>
#include <string.h>
#include <ctype.h>


int main(void)
{
    
    string name = GetString();
    
    do
    {
        bool inner_name = false;
        int name_length = strlen(name);
        for (int i = 0; i < name_length; i++)
        {
            char j = name[i];
            
            if (j != ' ' && inner_name == false)
            {
                printf("%c", toupper(j));
                inner_name= true;
                
            }
            if(j == ' ')
            {
                inner_name= false;
            }
        
        }
        printf("\n");
        break;
    }while(name != NULL);
}