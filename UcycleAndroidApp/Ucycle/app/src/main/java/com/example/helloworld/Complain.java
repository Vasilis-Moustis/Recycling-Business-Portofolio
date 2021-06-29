package com.example.helloworld;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.squareup.okhttp.HttpUrl;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.Response;

import java.io.IOException;

public class Complain extends AppCompatActivity {

    OkHttpClient client = new OkHttpClient();
    String gurl = "http://192.168.1.151:8000/";
    private EditText afm, uname, iban, amka, email, address, phone;
    private Button newuser;
    private TextView resultbillboard;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_complain);
        //////////////////////
        StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
        StrictMode.setThreadPolicy(policy);
        //////////////////////
        newuser = (Button) findViewById(R.id.newuser);
        newuser.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                createNewUser();
            }
        });

    }

    private void createNewUser(){
        //////////////////////gathering data
        email = (EditText) findViewById(R.id.email);
        String uemail = email.getText().toString();
        amka = (EditText) findViewById(R.id.amka);
        String uamka = amka.getText().toString();
        address = (EditText) findViewById(R.id.afm);
        String uaddress = address.getText().toString();
        phone = (EditText) findViewById(R.id.phone);
        String uphone = phone.getText().toString();
        iban = (EditText) findViewById(R.id.iban);
        String uiban = iban.getText().toString();
        uname = (EditText) findViewById(R.id.uname);
        String uuname = uname.getText().toString();
        afm = (EditText) findViewById(R.id.afm);
        String uafm = afm.getText().toString();
        //////////////////////
        String result = null;
        String  url = gurl;
        try {
            result = run(url, uafm.toString(), uemail.toString(), uamka.toString(), uaddress.toString(), uphone.toString(), uiban.toString(), uuname.toString());
            /*
            if (result.toString().equals("complain")){
                //backToMenu();
            }else{
                //display failed login message
            }*/
            resultbillboard = (TextView) findViewById(R.id.resultbillboard);
            resultbillboard.setText(result.toString());
        } catch (IOException e) {
            e.printStackTrace();
        }
    }


    private void backToMenu() {
        Intent intent = new Intent(this, menu.class);
        startActivity(intent);
    }

    public String fillSearchView(String url) {
        String urlcopy = gurl;
        try {
            HttpUrl.Builder urlBuilder = HttpUrl.parse(urlcopy).newBuilder();
            urlBuilder
                    .addQueryParameter("action", "givemeoptions");
            urlcopy = urlBuilder.build().toString();
        }catch(Exception i){
            i.printStackTrace();
        }

        try {
            Request request = new Request.Builder()
                    .url(urlcopy)
                    .get()
                    .build();

            Response response = client.newCall(request)
                    .execute();
            return response.body().string().toString();
        }catch(Exception j){
            return "j\n" + j.toString();
        }
    }


    public static String run(String url, String afm, String email, String amka, String address, String phone, String iban, String name) throws IOException {
        // issue the Get request
        Complain example = new Complain();
        String getResponse = example.doGetRequest(url, name, afm, iban, amka, email, address, phone);
        return getResponse;
    }

    public String doGetRequest(String url, String name, String afm, String iban, String amka, String email, String address, String phone) throws IOException {

        try {
            HttpUrl.Builder urlBuilder = HttpUrl.parse(url).newBuilder();
            urlBuilder
                    .addQueryParameter("action", "iwantintoo")
                    .addQueryParameter("name", name)
                    .addQueryParameter("afm", afm)
                    .addQueryParameter("iban", iban)
                    .addQueryParameter("amka", amka)
                    .addQueryParameter("email", email)
                    .addQueryParameter("address", address)
                    .addQueryParameter("phone", phone);

            url = urlBuilder.build().toString();
        }catch(Exception i){
            i.printStackTrace();
        }

        try {
            Request request = new Request.Builder()
                    .url(url)
                    .get()
                    .build();

            Response response = client.newCall(request)
                    .execute();
            return response.body().string().toString();
        }catch(Exception j){
            return "j\n" + j.toString();

        }

    }

}
