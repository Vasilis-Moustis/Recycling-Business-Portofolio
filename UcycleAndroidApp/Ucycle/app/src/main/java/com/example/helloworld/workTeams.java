package com.example.helloworld;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.os.StrictMode;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;

import com.squareup.okhttp.HttpUrl;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.Response;

import java.io.IOException;

public class workTeams extends AppCompatActivity {

    OkHttpClient client = new OkHttpClient();
    String gurl = "http://192.168.1.151:8000/";
    private Button usecalculator;
    private TextView calculation;
    private EditText recweight;
    private Spinner matids2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_work_teams);
        //////////////////////
        StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
        StrictMode.setThreadPolicy(policy);
        //////////////////////
        String searching = fillSearchView(gurl);
        String[] options = searching.split(",");
        String[] arraySpinner = options;
        final Spinner matids2 = (Spinner) findViewById(R.id.matids2);
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,
                android.R.layout.simple_spinner_item, arraySpinner);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        matids2.setAdapter(adapter);
        ////////////////////////////
        usecalculator = (Button) findViewById(R.id.usecalculator);
        usecalculator.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String result = null;
                try {

                    recweight = (EditText) findViewById(R.id.recweight);
                    String weight = recweight.getText().toString();
                    final String material = (String) matids2.getSelectedItem();
                    try {
                        result = run(gurl, material, weight.toString());
                    } catch (IOException e) {
                        e.printStackTrace();
                    }

                    //code
                    calculation = (TextView) findViewById(R.id.calculation);
                    calculation.setText(result.toString());
                    //calculation.setText(matids2.toString());


                }
                catch (Exception e)
                {
                    calculation = (TextView) findViewById(R.id.calculation);
                    calculation.setText("Something wen terribly wrong...");
                }
            }
        });
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

    public static String run(String url, String material, String weight) throws IOException {
        // issue the Get request
        workTeams example = new workTeams();
        String getResponse = example.doGetRequest(url, material, weight);
        return getResponse;
    }

    public String doGetRequest(String url, String material, String weight){

        try {
            HttpUrl.Builder urlBuilder = HttpUrl.parse(gurl).newBuilder();
            urlBuilder
                    .addQueryParameter("action", "calculate")
                    .addQueryParameter("material", material)
                    .addQueryParameter("weight", weight);

            url = urlBuilder.build().toString();
        }catch(Exception i){
            i.printStackTrace();
            return i.toString();
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