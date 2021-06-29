package com.example.helloworld;

import androidx.appcompat.app.AppCompatActivity;
import android.os.Bundle;
import android.os.StrictMode;
import android.widget.EditText;

import com.squareup.okhttp.HttpUrl;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.Response;

import java.io.IOException;

public class stats extends AppCompatActivity {

    OkHttpClient client = new OkHttpClient();
    String gurl = "http://192.168.1.151:8000/";
    private EditText recycleroty, donatoroty, retaileroty, totaldonated;
    String[] statistics = new String[4];

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_stats);
        //////////////////////
        StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
        StrictMode.setThreadPolicy(policy);
        //////////////////////
        String result = null;
        try {
            result = run(gurl);
            //code
            statistics = result.split(",");
            /////////////
            recycleroty = (EditText) findViewById(R.id.recycleroty);
            recycleroty.setText(statistics[0].toString());
            retaileroty = (EditText) findViewById(R.id.retaileroty);
            retaileroty.setText(statistics[1].toString());
            donatoroty = (EditText) findViewById(R.id.donatoroty);
            donatoroty.setText(statistics[2].toString());
            totaldonated = (EditText) findViewById(R.id.totaldonated);
            totaldonated.setText(statistics[3].toString());
        } catch (IOException e) {

        }
    }

    public static String run(String url) throws IOException {
        // issue the Get request
        stats example = new stats();
        String getResponse = example.doGetRequeststat(url);
        return getResponse;
    }

    public String doGetRequeststat(String url) throws IOException {

        try {
            HttpUrl.Builder urlBuilder = HttpUrl.parse(url).newBuilder();
            urlBuilder
                    .addQueryParameter("action", "stats");
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
            j.printStackTrace();
            return j.toString();
        }

    }


}