void setup(){
  Serial.begin(115200);
  //以下ホール素子
  pinMode(2, INPUT);
  pinMode(8, INPUT);
  pinMode(12, INPUT);
  }

//ループカウンタ
int a = 0; //1
int b = 0; //2
int c = 0; //3

void loop(){
  int ha_1 = digitalRead(2);
  int ha_2 = digitalRead(8);
  int ha_3 = digitalRead(12);
  delay(10);

//一度閉じられたら a=1 になる
  if(ha_1 == 1 && a == 0){
    a = 1;
    Serial.print("a");
    delay(10);}
  if(ha_2 == 1 && b == 0){
    b = 1;
    Serial.print("b");
    delay(10);}
  if(ha_3 == 1 && c == 0){
    c = 1;
    Serial.print("c");
    delay(10);}

//一度閉じられていて(a=1)、そこから開検知をしたらデータを送信し、
//a==2にすることで反応しなくする
  if(ha_1 == 0 && a == 1){
    Serial.print("1");
    a = 2;}
  if(ha_2 == 0 && b == 1){
    Serial.print("2");
    b = 2;}
  if(ha_3 == 0 && c == 1){
    Serial.print("3");
    c = 2;}
  delay(10); 
}
