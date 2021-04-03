#include<stdio.h>
int main()
{
	int awal, beda, n,total;
	printf("Masukan nilai a: ");
	scanf("%d", &awal);
	total=awal;
	printf("Masukan nilai b: ");
	scanf("%d", &beda);
	printf("Masukan nilai n : ");
	scanf("%d", &n);
	for(int i=0;i<n;i++){
		awal=awal+beda;	
		total= total+awal; 
	}
	printf("Nilai Un= %d\n", awal);
	printf("Nilai total deret : %d", total);

	return 0;
}

