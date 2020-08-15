/**
 * recover.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Recovers JPEGs from a forensic image.
 */
 
 #include <stdio.h>
 #include <stdlib.h>
 #include <stdint.h>
 #include <string.h>
 #include <stdbool.h>

int main(int argc, char *agrv[])
{
    
    
    uint8_t buffer[512];
    uint8_t check_byte[4];
    char filename[8];
    
    FILE* photos_file = fopen("card.raw", "r");
    
    
    if (photos_file == NULL)
    {
        fclose(photos_file);
        fprintf(stderr,"Unable to open the card file.\n");
        return 1;
    }
    
    uint8_t is_jpeg1[4] = {0xff, 0xd8, 0xff, 0xe0};
    uint8_t is_jpeg2[4] = {0xff, 0xd8, 0xff, 0xe1};
    
    int jpeg_made =0;
    
    

    //fread(buffer, 512, 1, photos_file);
    bool opened = false;
    FILE* outp;
   
    
        while (fread(buffer, sizeof(buffer), 1, photos_file)>0)
        {
            for(int i=0; i<4; i++)
            {
                check_byte[i] = buffer[i];
                
            }
            
            if((memcmp(is_jpeg1, check_byte , 4) ==0) || (memcmp(check_byte, is_jpeg2, sizeof(check_byte)) ==0))
            {
                

                sprintf(filename, "%03d.jpg", jpeg_made);
                
                if (!opened)
                {
                    outp=fopen(filename, "w");
                    fwrite(buffer, sizeof(buffer), 1, outp);
                    opened=true;
                }
                
                if(opened)
                {
                    fclose(outp);
                    outp=fopen(filename, "w");
                    fwrite(buffer, sizeof(buffer), 1, outp);
                    jpeg_made++;
                    
                }
            
                
            }
            else
            {
                if(opened)
                {
                
                    fwrite(buffer, sizeof(buffer), 1, outp);
                }
            }
            
        }
   
    if(outp)
    {
        fclose(outp);
    }
    fclose(photos_file);
    return 0;
    
}
