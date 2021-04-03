#include <iostream>
 
using namespace std;
 
int main()
{
	    string cars[10] = {"D","U","M","B","W","A","Y","S","I","D"};

 
  int z,i,j,x,y;

 
  for(i=1;i<=2;i++) {
    for(j=1;j<=6;j++) {
      cout << " *=";
    }
    cout << endl;
  }

  for(z=0;z<10;z++) {
	cout<<" "<<cars[z];
	
}  
cout << endl;
  for(x=1;x<=2;x++) {
    for(y=1;y<=6;y++) {
      cout << " =*";
    }
    cout << endl;
  }

  
 
  
}
