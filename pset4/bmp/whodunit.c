/**
 * whodunit.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Copies a BMP piece by piece, just because.
 */
       
#include <stdio.h>
#include <stdlib.h>

#include "bmp.h"

int main(int argc, char *argv[])
{
    // ensure proper usage
    if (argc != 2)
    {
        printf("Usage: ./whodunit clue_file\n");
        return 1;
    }

    // remember filenames
    


    // open input file 
    FILE* clueptr = fopen(argv[1], "r");
    if (clueptr == NULL)
    {
        printf("Could not open %s.\n", argv[1]);
        return 2;
    }

    // write/create solution file
    FILE* solution_ptr = fopen("solution.bmp", "w");
    if (solution_ptr == NULL)
    {
        fclose(clueptr);
        fprintf(stderr, "Could not create %s.\n", "solution.bmp");
        return 3;
    }

    // read infile's BITMAPFILEHEADER
    BITMAPFILEHEADER bf;
    fread(&bf, sizeof(BITMAPFILEHEADER), 1, clueptr);

    // read infile's BITMAPINFOHEADER
    BITMAPINFOHEADER bi;
    fread(&bi, sizeof(BITMAPINFOHEADER), 1, clueptr);

    // ensure infile is (likely) a 24-bit uncompressed BMP 4.0
    if (bf.bfType != 0x4d42 || bf.bfOffBits != 54 || bi.biSize != 40 || 
        bi.biBitCount != 24 || bi.biCompression != 0)
    {
        fclose(solution_ptr);
        fclose(clueptr);
        fprintf(stderr, "Unsupported file format.\n");
        return 4;
    }

    // write outfile's BITMAPFILEHEADER
    fwrite(&bf, sizeof(BITMAPFILEHEADER), 1, solution_ptr);

    // write outfile's BITMAPINFOHEADER
    fwrite(&bi, sizeof(BITMAPINFOHEADER), 1, solution_ptr);
    
    // determine padding for scanlines
    int padding =  (4 - (bi.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;
    
    // iterate over infile's scanlines
    for (int i = 0, biHeight = abs(bi.biHeight); i < biHeight; i++)
    {
        // iterate over pixels in scanline
        for (int j = 0; j < bi.biWidth; j++)
        {
            // temporary storage
            RGBTRIPLE triple;

            // read RGB triple from infile
            fread(&triple, sizeof(RGBTRIPLE), 1, clueptr);
                
            if(triple.rgbtRed==0xff && triple.rgbtBlue==0x00 && triple.rgbtGreen==0x00)
            {
                triple.rgbtBlue=0xff;
                triple.rgbtGreen=0xff;
            }
            
            
            // write RGB triple to outfile
            fwrite(&triple, sizeof(RGBTRIPLE), 1, solution_ptr);
        
        }
        // skip over padding, if any
            fseek(clueptr, padding, SEEK_CUR);
           
        // then add it back (to demonstrate how)
        for (int k = 0; k < padding; k++)
        {
            fputc(0x00, solution_ptr);
        }
    }

    // close infile
    fclose(clueptr);

    // close outfile
    fclose(solution_ptr);

    // that's all folks
    return 0;
}
