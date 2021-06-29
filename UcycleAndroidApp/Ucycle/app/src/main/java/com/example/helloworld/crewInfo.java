package com.example.helloworld;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Switch;
import android.widget.TextView;

import com.squareup.okhttp.HttpUrl;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.Response;

import java.io.IOException;
import java.util.Arrays;
import java.util.List;


public class crewInfo extends AppCompatActivity {

    OkHttpClient client = new OkHttpClient();
    String gurl = "http://192.168.1.151:8000/";
    private TextView todo;
    private Button recycle, logout;
    private EditText userafm, weight, donate;
    private Spinner matids;
    List<String> proastiaSpinner = Arrays.asList("Κεντρικού Τομέα Αθηνών" , "Νοτίου Τομέα Αθηνών", "Βορείου Τομέα Αθηνών", "Δυτικού Τομέα Αθηνών", "Πειραιώς", "Νήσων Αττικής", "Δυτικής Αττικής", "Ανατολικής Αττικής");


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_crew_info);
        //////////////////////
        StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
        StrictMode.setThreadPolicy(policy);
        //////////////////////
        String searching = fillSearchView(gurl);
        String[] options = searching.split(",");
        String[] arraySpinner = options;
        final Spinner s = (Spinner) findViewById(R.id.matids);
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,
                android.R.layout.simple_spinner_item, arraySpinner);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        s.setAdapter(adapter);
        recycle = (Button) findViewById(R.id.recycle);
        recycle.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String result = null;
                try {
                    userafm = (EditText) findViewById(R.id.userafm);
                    String afm = userafm.getText().toString();
                    weight = (EditText) findViewById(R.id.weight);
                    String uweight = weight.getText().toString();
                    final String material = (String) s.getSelectedItem();
                    donate = (EditText) findViewById(R.id.donate);
                    String donor = donate.getText().toString();
                    result = run(gurl,material, uweight.toString(), afm.toString(), donor.toString());
                    //code
                    todo = (TextView) findViewById(R.id.todo);
                    todo.setText(result.toString());
                } catch (IOException e) {
                    todo = (TextView) findViewById(R.id.todo);
                    todo.setText(e.toString());
                }
            }
        });


        logout = (Button) findViewById(R.id.logout);
        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                logout();
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

    public void logout() {
        Intent intent = new Intent(this, login.class);
        startActivity(intent);
    }

    public static String run(String url, String material, String weight, String userafm, String donor) throws IOException {
        // issue the Get request
        crewInfo example = new crewInfo();
        String getResponse = example.doGetRequest(url, material, weight, userafm, donor);
        return getResponse;
    }

    public String doGetRequest(String url, String material, String weight, String userafm, String donor) throws IOException {
        String donate = donor;
        try {
            HttpUrl.Builder urlBuilder = HttpUrl.parse(url).newBuilder();
            urlBuilder
                  .addQueryParameter("action", "recycled")
                    .addQueryParameter("material", material)
                    .addQueryParameter("weight", weight)
                    .addQueryParameter("userafm", userafm)
                    .addQueryParameter("donate", donate);

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

/*
public class test
{
    public static void main(String str[])
    {
        String jsonString = "{\"stat\": { \"sdr\": \"aa:bb:cc:dd:ee:ff\", \"rcv\": \"aa:bb:cc:dd:ee:ff\", \"time\": \"UTC in millis\", \"type\": 1, \"subt\": 1, \"argv\": [{\"type\": 1, \"val\":\"stackoverflow\"}]}}";
        JSONObject jsonObject = new JSONObject(jsonString);
        JSONObject newJSON = jsonObject.getJSONObject("stat");
        System.out.println(newJSON.toString());
        jsonObject = new JSONObject(newJSON.toString());
        System.out.println(jsonObject.getString("rcv"));
       System.out.println(jsonObject.getJSONArray("argv"));
    }
}
 */