/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */
       
#include <cs50.h>

#include "helpers.h"

/**
 * Returns true if value is in array of n values, else false.
 */
bool search(int value, int values[], int n)
{
    //
    int ending = n-1;
    int starter = 0;
    
    while (ending>= starter)
    {
        int middle = (starter+ending)/2;
        if (values[middle] == value)
        {
            return true;
        }
        else if(values[middle]> value)
        {
            ending = middle-1;
        }
        else
        {
            starter = middle+1;
        }
    
    }
    return false;
}

/**
 * Sorts array of n values.
 * Via Selection Sort Algorithm
 */
void sort(int values[], int n)
{
    int temp;
    for(int i = 0; i<n; i++)
    {
        int bottom = i;
        for (int j = i+1; j<n;j++)
        {
            if (values[bottom] > values[j])
            {
                bottom = j;
            }
        }
        temp=values[bottom];
        values[bottom] = values[i];
        values[i]=temp;
    }
}
