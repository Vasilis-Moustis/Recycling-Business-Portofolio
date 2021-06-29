package com.example.helloworld;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class partner extends AppCompatActivity {

    private Button p1b;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_partner);

        p1b = (Button) findViewById(R.id.p1b);
        p1b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                goback();
            }
        });

    }

    public void goback() {
        Intent intent = new Intent(this, Oursponsors.class);
        startActivity(intent);
    }
}