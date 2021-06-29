package com.example.helloworld;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import com.squareup.okhttp.Request;
import com.squareup.okhttp.Response;

import java.io.IOException;

import okhttp3.HttpUrl;
import com.squareup.okhttp.MediaType;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.RequestBody;
import com.squareup.okhttp.Response;

import okhttp3.HttpUrl;

public class MainActivity extends AppCompatActivity {

    private Button login,gotomenu,gotosponsors, gotostats, justforthelogo;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        gotomenu = (Button) findViewById(R.id.gotomenu);
        gotomenu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                openmenu();
            }
        });

        login = (Button) findViewById(R.id.login);
        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                openlogin();
            }
        });

        justforthelogo = (Button) findViewById(R.id.justforthelogo);
        justforthelogo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                goToUrl();
            }
        });

        gotosponsors = (Button) findViewById(R.id.gotosponsors);
        gotosponsors.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                showSponsors();
            }
        });

        gotostats = (Button) findViewById(R.id.gotostats);
        gotostats.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                showStats();
            }
        });
    }

    private void goToUrl () {
        String url = "http://192.168.1.157:8080/index.html";
        Uri uriUrl = Uri.parse(url);
        Intent launchBrowser = new Intent(Intent.ACTION_VIEW, uriUrl);
        startActivity(launchBrowser);
    }

    private void openlogin() {
        Intent intent = new Intent(this, login.class);
        startActivity(intent);
    }

    public void openmenu() {
        Intent intent = new Intent(this, menu.class);
        startActivity(intent);
    }

    private void showSponsors() {
        Intent intent = new Intent(this, Oursponsors.class);
        startActivity(intent);
    }

    private void showStats() {
        Intent intent = new Intent(this, stats.class);
        startActivity(intent);
    }
}
